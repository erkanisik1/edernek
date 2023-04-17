<?php namespace ZN\Pagination;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Base;
use ZN\Config;
use ZN\Request\URL;
use ZN\Request\URI;

class Paginator implements PaginatorInterface
{
    /**
     * Keep settings
     * 
     * @var array
     */
    protected $settings = [];

    /**
     * Keeps class attibute
     * 
     * @var string
     */
    protected $classAttribute; 
    
    /**
     * Keeps style attibute
     * 
     * @var string
     */
    protected $styleAttribute;

    /**
     * Default total rows
     * 
     * @var int
     */
    protected $totalRows = 50;
    
    /**
     * Default start value
     * 
     * @var int
     */
    protected $start = 0;

    /**
     * Default pagination type
     * 
     * @var string
     */
    protected $type = 'classic';

    /**
     * Default pagination type
     * 
     * @var string
     */
    protected $paging = 'row';

    /**
     * Default limit value
     * 
     * @var int
     */
    protected $limit = 10;

    /**
     * Default count links
     * 
     * @var int
     */
    protected $countLinks = 10;

    /**
     * Keep class value
     * 
     * @var array
     */
    protected $class = [];

    /**
     * Keep style value
     * 
     * @var array
     */
    protected $style = [];

    /**
     * Default prev tag name
     * 
     * @var string
     */
    protected $prevName = '[prev]';

     /**
     * Default next tag name
     * 
     * @var string
     */
    protected $nextName = '[next]';

     /**
     * Default first tag name
     * 
     * @var string
     */
    protected $firstName = '[first]';

     /**
     * Default last tag name
     * 
     * @var string
     */
    protected $lastName = '[last]';

     /**
     * Default url
     * 
     * @var string
     */
    protected $url = CURRENT_CFPATH;

    /**
     * Output type
     * 
     * @var string
     */
    protected $output = 'classic';

    /**
     * Keeps pagination config
     */
    protected $config;

    /**
     * Magic constructor
     * 
     * @param void
     * 
     * @return void
     */
    public function __construct()
    {
        $this->config = Config::default('ZN\Pagination\PaginationDefaultConfiguration')::viewObjects('pagination');
    }

    /**
     * Specifies the URL.
     * 
     * @param string $url
     * 
     * @return Paginator
     */
    public function url(string $url) : Paginator
    {
        $this->settings['url'] = $url;

        return $this;
    }

    /**
     * Sets the paging initial value.
     * 
     * @param mixed $start
     * 
     * @return Paginator
     */
    public function start($start) : Paginator
    {
        $this->settings['start'] = $start;

        return $this;
    }

    /**
     * Sets the amount of data to be displayed at one time.
     * 
     * @param int $limit
     * 
     * @return Paginator
     */
    public function limit(int $limit) : Paginator
    {
        $this->settings['limit'] = $limit;

        return $this;
    }

    /**
     * Pagination usage type.
     * If you select Ajax, ajax needs to be written. 
     * Several data are defined for this.
     * 
     * @param string $type - options[ajax|classic]
     */
    public function type(string $type) : Paginator
    {
        $this->settings['type'] = $type;

        return $this;
    }

    /**
     * Paging
     * 
     * @param string $paging - options[row|page]
     * 
     * @return Paginator
     */
    public function paging(string $paging) : Paginator
    {
        $this->settings['paging'] = $paging;

        return $this;
    }

    /**
     * Sets the total number of records.
     * 
     * @param int $totalRows
     * 
     * @return Paginator
     */
    public function totalRows(int $totalRows) : Paginator
    {
        $this->settings['totalRows'] = $totalRows;

        return $this;
    }

    /**
     * Sets the number of page links to be displayed at one time.
     * 
     * @param int $countLinks
     * 
     * @return Paginator
     */
    public function countLinks(int $countLinks) : Paginator
    {
        $this->settings['countLinks'] = $countLinks;

        return $this;
    }

    /**
     * Change the names of links.
     * 
     * @param string $prev
     * @param string $next
     * @param string $first
     * @param string $last
     * 
     * @return Paginator
     */
    public function linkNames(string $prev, string $next, string $first, string $last) : Paginator
    {
        $this->settings['prevName']  = $prev;
        $this->settings['nextName']  = $next;
        $this->settings['firstName'] = $first;
        $this->settings['lastName']  = $last;

        return $this;
    }

    /**
     * Sets paging's css values.
     * 
     * @param array $css
     * 
     * @return Paginator
     */
    public function css(array $css) : Paginator
    {
        $this->settings['class'] = $css;

        return $this;
    }

    /**
     * Sets paging's style values.
     * 
     * @param array $style
     * 
     * @return Paginator
     */
    public function style(array $style) : Paginator
    {
        $this->settings['style'] = $style;

        return $this;
    }

    /**
     * Sets paging's output type.
     * 
     * @param string $type - options[bootstrap|classic]
     * 
     * @return Paginator
     */
    public function output(string $type) : Paginator
    {
        $this->settings['output'] = $type;

        return $this;
    }

    /**
     * Returns the current URL for paging.
     * 
     * @param string $page = NULL
     * 
     * @return string
     */
    public function getURI(string $page = NULL) : string
    {
        return $this->checkGetRequest($page);
    }

    /**
     * Configures all settings of the page.
     * 
     * @param array $cofig = []
     * 
     * @return Paginator
     */
    public function settings(array $config = []) : Paginator
    {
        foreach( $config as $key => $value )
        {
            $this->$key = $value;
        }        

        $this->class = array_merge($this->config['class'] ?? [], $this->class ?? []);
        $this->style = array_merge($this->config['style'] ?? [], $this->style ?? []);

        if( isset($config['url']) && $this->type !== 'ajax' )
        {
            $this->url = Base::suffix(URL::site($config['url']));
        }
        elseif( $this->type === 'ajax' )
        {
            $this->url = 'javascript:;';
        }
        else
        {
            $this->url = CURRENT_CFURL;
        }

        return $this;
    }

    /**
     * Creates the pagination.
     * 
     * @param mixed $start
     * @param array $settings = []
     * 
     * @return string
     */
    public function create($start = NULL, array $settings = []) : string
    {
        # The configuration arrays are merge.
        $settings = array_merge($this->config, $this->settings, $settings);

        # If the configuration is present, it is rearranged.
        if( ! empty($settings) )
        {
            $this->settings($settings);
        }

        # Gets information about which recording to start the paging process.
        $startRowNumber = $this->convertPaging($this->getStartRowNumber($start));

        # If the limit is set to 0, 1 is accepted.
        $this->limit = $this->limit === 0 ? 1 : $this->limit;
        
        # Generate pagination bar.
        if( $this->isPaginationBar() )
        {
            $return = $this->isBasicPaginationBar() ? $this->createBasicPaginationBar($startRowNumber) : $this->createAdvancedPaginationBar($startRowNumber);

            $this->defaultVariables();

            return $return;
        }

        return false;
    }

    /**
     * Protected create basic pagination bar
     */
    protected function createBasicPaginationBar($startRowNumber)
    {
        # Generate pagination bar.
        return $this->generatePaginationBar($this->getNumberLinks($this->getPerPage(), $startRowNumber));
    }

    /**
     * Protected create advanced pagination bar
     */
    protected function createAdvancedPaginationBar($startRowNumber)
    {
        # Add first, next, last links.
        if( $this->isAdvancedNextLink($startRowNumber) )
        {
            $this->addNextLink($startRowNumber, $nextLink);
            $this->addLastLink($lastLink);
            
            $pageIndex = $this->getPageIndex($startRowNumber);
        }
        # Remove next, last links.
        else
        {
            $this->removeLinkFromPagingationBar($nextLink);
            $this->removeLinkFromPagingationBar($lastLink);

            $pageIndex = $this->getPageIndexWithoutNextLinks();
        }

        $advancedPerPage = $this->getAdvancedPerPage($pageIndex, $nextLink, $lastLink);
        
        return $this->generatePaginationBar($this->getNumberLinks($advancedPerPage, $startRowNumber, $pageIndex), $nextLink, $lastLink);
    }

    /**
     * Protected implode links
     */
    protected function implodeLinks(...$links)
    {
        return implode(' ', $links);
    }

    /**
     * Protected get page index without next linkx
     */
    protected function getPageIndexWithoutNextLinks()
    {
        return $this->getPerPage() - $this->countLinks + 1;
    }

    /**
     * Protected get page index
     */
    protected function getPageIndex($startRowNumber)
    {
        if( ($startRowNumber / $this->limit) == 0 )
        {
            return 1;
        }
        
        return floor($startRowNumber / $this->limit + 1);
    }

    /**
     * Protected get first link
     */
    protected function addFirstLink(&$firstLink)
    {
        $firstLink = $this->getLink(0, $this->getStyleClassAttributes('first'), $this->firstName);
    }

    /**
     * Protected get last link
     */
    protected function addLastLink(&$lastLink)
    {
        $lastLink = $this->getLink($this->calculatePageRowNumberForLastLink(), $this->getStyleClassAttributes('last'), $this->lastName);
    }

    /**
     * Protected get prev link
     */
    protected function addPrevLink($startRowNumber, &$prevLink)
    {
        $prevLink = $this->getLink($this->decrementPageRowNumber($startRowNumber), $this->getStyleClassAttributes('prev'), $this->prevName);
    }

    /**
     * Protected get advanced next link
     */
    protected function addNextLink($startRowNumber, &$nextLink)
    {
        $nextLink = $this->getLink($this->incrementPageRowNumber($startRowNumber), $this->getStyleClassAttributes('next'), $this->nextName);
    }

    /**
     * Protected get start row number
     */
    protected function getStartRowNumber($start)
    {
        if( $this->start !== NULL )
        {
            $start = (int) $this->start;
        }

        if( empty($start) && ! is_numeric($start) )
        {
            return ! is_numeric($segment = explode('?', URI::segment(-1))[0]) ? 0 : $segment;
        }
        
        return ! is_numeric($start) ? 0 : $start;
    }

    /**
     * Protected is basic pagination bar
     */
    protected function isBasicPaginationBar()
    {
        return $this->countLinks > $this->getPerPage();
    }

    /**
     * Protected is pagination bar
     */
    protected function isPaginationBar()
    {
        return $this->totalRows > $this->limit;
    }

    /**
     * Protected advanced per page.
     */
    protected function getAdvancedPerPage($pageIndex, &$nextLink, &$lastLink)
    {
        $perPage = $this->countLinks + $pageIndex - 1;

        if( $perPage >= ($getPerPage = $this->getPerPage()) )
        {
            $this->removeLinkFromPagingationBar($nextLink);
            $this->removeLinkFromPagingationBar($lastLink);

            $perPage = $getPerPage;
        }

        return $perPage;
    }

    /**
     * Protected get per page
     */
    protected function getPerPage()
    {
        return ceil($this->totalRows / $this->limit);
    }

    /**
     * Protected is advanced next link
     */
    protected function isAdvancedNextLink($startRowNumber)
    {
        return $startRowNumber < $this->totalRows - $this->limit;
    }

    /**
     * Protected get number links
     */
    protected function getNumberLinks($perPage, $startRowNumber, $startIndexNumber = 1)
    {
        # It keeps the links to be added to the end of the bar.
        $afterLinks  = '';

        # It keeps the links to be added to the begin of the bar.
        $beforeLinks = '';

        # It keeps the links to be formed.
        $numberLinks = '';

        # It keeps the last page information.
        $lastPage    = $this->getPerPage();  

        # It keeps the number of links to be displayed in pagination.
        $countLinks  = $this->countLinks;

        # It keeps the active page number.
        $current     = floor((int) $startRowNumber / $this->limit);

        # Holds the pagination start number.
        $startIndexNumber = $current + 1;

        # If the number of paging links is selected even, it is increased by one and converted to an odd number.
        if( $countLinks % 2 == 0 )
        {
            $countLinks += 1;
        }

        # TThe number of links the active page will be centered on the bar.
        $middle = ceil($countLinks / 2);

        # The number of connections before the centered section.
        $step   = $middle - 1;
        
        # Actions performed towards the end of the paging bar.
        if( $lastPage == $perPage )
        {   
            # Determines the paging start by the number of steps.
            $startIndexNumber = $startIndexNumber - $step;
            
            # The number of progress in the paging bar.
            $progressCount = $lastPage - $current - $step - 1;

            # If there has been progress in the paging bar, it retracts the page break number as much as the amount of progress.
            if( $progressCount >= 0 )
            {
                $perPage = $perPage - $progressCount;
            }     
            # If there is no progress on the paging bar, it adds the value of the progress amount to the page starting value.
            else
            {
                $startIndexNumber += $progressCount;
            }

            # Next page button is added to the paging bar.
            if( $this->isAdvancedNextLink($startRowNumber) )
            {
                $this->addNextLink($startRowNumber, $nextLink);
           
                $afterLinks = $nextLink;

                if( $perPage != $lastPage )
                {
                    $this->addLastLink($lastLink);
                
                    $afterLinks .= $lastLink;
                }
            }
        }
        # Actions related to the beginning of paging.
        else if( $startIndexNumber <= $middle )
        {
            # The number of progress in the paging bar.
            $progressCount = $step - ($middle - $startIndexNumber);

            # Subtracts the number of progress from the page break value.
            $perPage = $perPage - $progressCount;

            # Sets the starting counting number to start.
            $startIndexNumber = 1;
        }
        # The middle part of the pagination related actions.
        else
        {
            # It starts from behind by the average number of steps.
            $startIndexNumber = $startIndexNumber - $step;

            # It ends as early as the average number of steps.
            $perPage = $perPage - $step;
        }

        # If the pagination start count is less than 1, it equals 1.
        if( $startIndexNumber < 1 )
        {
            $startIndexNumber = 1;
        }
        
        # If there has been progress in counting, add prev link.
        if( $current > 0 )
        {
            $this->addPrevLink($startRowNumber, $prevLink);
           
            $beforeLinks = $prevLink;
        }

        # If the progress is too advanced for the first page to appear, add first link.
        if( $startIndexNumber > 1 )
        {
            $this->addFirstLink($firstLink);
           
            $beforeLinks = $firstLink . $beforeLinks;
        }

        # Creates pagination links.
        for( $i = $startIndexNumber; $i <= $perPage; $i++ )
        {
            $page = ($i - 1) * $this->limit;

            # Active page link.
            if( $i - 1 == $current )
            {
                $currentLink = $this->getStyleClassAttributes('current');
            }
            # Other page links.
            else
            {
                $currentLink = $this->getStyleClassLinkAttributes('links');;
            }

            # Added pagination links.
            $numberLinks .= $this->getLink($page, $currentLink, $i);
        }

        # Return pagination links.
        return $beforeLinks . $numberLinks . $afterLinks;
    }

    /**
     * Protected increment page row number
     */
    protected function incrementPageRowNumber($startRowNumber)
    {
        return $startRowNumber + $this->limit;
    }

    /**
     * Protected decrement page row number
     */
    protected function decrementPageRowNumber($startRowNumber)
    {
        return $startRowNumber - $this->limit;
    }

    /**
     * Protected page row number for last link
     */
    protected function calculatePageRowNumberForLastLink()
    {
        $mod = $this->totalRows % $this->limit;

        return ($this->totalRows - $mod ) - ($mod == 0 ? $this->limit : 0);
    }

    /**
     * Protected remove link from paging bar
     */
    protected function removeLinkFromPagingationBar(&$data)
    {
        $data = NULL;
    }

    /**
     * protected get style & class link attibutes
     */
    protected function getStyleClassLinkAttributes($type)
    {
        return $this->getClassLinkAttribute($type) . $this->getStyleLinkAttribute($type);
    }

    /**
     * Protected get style class attibutes
     */
    protected function getStyleClassAttributes($type)
    {
        return $this->getClassAttribute($type) . $this->getStyleAttribute($type);
    }

    /**
     * Protected explode request get value
     */
    protected function explodeRequestGetValue()
    {
        return ( $string = explode('?', $_SERVER['REQUEST_URI'])[1] ?? NULL)
               ? '?' . $string
               : '';
    }

    /**
     * Protected check get request
     */
    protected function checkGetRequest($page)
    {
        $this->url .= $this->explodeRequestGetValue();

        if( strstr($this->url, '?') )
        {
            $urlEx = explode('?', $this->url);

            return Base::suffix($urlEx[0]) . $page . '?' . rtrim($urlEx[1], '/');
        }

        return $this->type === 'ajax' ? $this->url : Base::suffix($this->url) . $page;
    }

    /**
     * Protected get link
     */
    protected function getLink($var, $fix, $val)
    {
        return $this->getHtmlLiElement($this->getHtmlAnchorElement($var, $fix, $val), $fix);
    }

    /**
     * Protected get html anchor element
     */
    protected function getHtmlAnchorElement($var, $attr, $val)
    {
        if( $this->output === 'bootstrap' )
        {
            $attr = ' class="page-link"';
        }

        $href       = $this->checkGetRequest($this->getPaging($var));
        $attributes = $this->getAttributesForAjaxProcess($var) . $attr;

        return  '<a href="' . $href . '"' . $attributes . '>' . $val . '</a>';
    }

    /**
     * Protectded get paging
     */
    protected function getPaging($row)
    {
        return $this->paging === 'row' ? $row : $this->getPageIndex($row);
    }

    /**
     * Protectded convert paging
     */
    public function convertPaging($row)
    {
        if( $this->paging === 'row' )
        {
            return $row;
        }

        if( $row == 0 )
        {
            return 1;
        }

        return ($row - 1) * $this->limit;
    }

    /**
     * Protected get html li element
     */
    protected function getHtmlLiElement($link, $fix)
    {
        if( $this->output === 'bootstrap' )
        {
            $fix = preg_replace('/class\=\"(.*?)\"/', 'class="page-item $1"', $fix ?? '');

            return '<li'.$fix.'>' . $link . '</li>';
        }

        return $link;
    }

    /**
     * Protected get html ul element
     */
    protected function generatePaginationBar(...$numberLinks)
    {
        $links = $this->implodeLinks(...$numberLinks);
        
        if( $this->output === 'bootstrap' )
        {
            return '<ul class="pagination">' . $links . '</ul>';
        }

        return $links;
    }

    /**
     * Protected get style link attribute
     */
    protected function getStyleLinkAttribute($var, $type = 'style')
    {
        $getAttribute = ( ! empty($this->{$type}[$var]) ) ? $this->{$type}[$var] . ' ' : '';

        if( $type === 'class' ) 
        {
            $this->classAttribute = $getAttribute; 
        }
        else 
        {
            $this->styleAttribute = $getAttribute;
        }
   
        return $this->createAttribute($getAttribute, $type);
    }

    /**
     * Protected get class link attribute
     */
    protected function getClassLinkAttribute($var)
    {
        return $this->getStyleLinkAttribute($var, 'class');
    }

    /**
     * Protected get class attribute
     */
    protected function getClassAttribute($var, $type = 'class')
    {
        $status = trim(( $type === 'class' ? $this->classAttribute : $this->styleAttribute) . $this->{$type}[$var]);

        return $this->createAttribute($status, $type);
    }

    /**
     * Protcted create attribute
     */
    protected function createAttribute($condition, $key, $value = NULL)
    {
        return ! empty($condition) ? ' ' . $key . '="' . trim($value ?? $condition) . '"' : '';
    }

   /**
     * Protected get style attribute
     */
    protected function getStyleAttribute($var)
    {
        return $this->getClassAttribute($var, 'style');
    }

    /**
     * Protected get attibutes for ajax process
     */
    protected function getAttributesForAjaxProcess($value)
    {
        if( $this->type === 'ajax' )
        {
            return ' prow="' . $value . '" ptype="ajax"';
        }
    }

    protected function defaultVariables()
    {
        $this->settings = [];
        $this->classAttribute = NULL;
        $this->styleAttribute = NULL;
        $this->totalRows = 50;
        $this->start = 0;
        $this->type = 'classic';
        $this->paging = 'row';
        $this->limit = 10;
        $this->countLinks = 10;
        $this->class = [];
        $this->style = [];
        $this->prevName = '[prev]';
        $this->nextName = '[next]';
        $this->firstName = '[first]';
        $this->lastName = '[last]';
        $this->url = CURRENT_CFPATH;
        $this->output = 'classic';
    }
}
