
<!-- ÜYE SAĞLIK BİLGİLERİ -->
<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
		<h5>ÜYE SAĞLIK BİLGİLERİ</h5>
	</div>    
	<div class="widget-content nopadding">

		<div class="control-group">
			<label class="control-label">SOSYAL GÜVENCESİ: </label>
			<div class="controls check">
				<label><input type="radio" name="s_guvence" value="bilinmiyor"> BİLİNMİYOR</label>
				<label><input type="radio" name="s_guvence" value="SGK (SSK, EMEKLİ SANDIĞI, BAĞKUR)">SGK (SSK, EMEKLİ SANDIĞI, BAĞKUR)</label>
				<label><input type="radio" name="s_guvence" value="GSS (YEŞİLKART, 2022)"> GSS (YEŞİLKART, 2022)</label>


			</div>
		</div>

		<div class="control-group">
			<label class="control-label">ENGELİN OLUŞ SEBEBİ: </label>
			<div class="controls check">

				<label><input type="checkbox" name="eos[]"  value="KAZA"> KAZA</label>
				<label><input type="checkbox" name="eos[]" value="HASTALIK"> HASTALIK</label>
				<label><input type="checkbox" name="eos[]" value="DOĞUŞTAN"> DOĞUŞTAN</label>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">ENGEL GRUBU: </label>
			<div class="controls check">

				<label><input type="checkbox" name="eng[]" value="BEDENSEL"> BEDENSEL</label>
				<label><input type="checkbox" name="eng[]" value="GÖRME"> GÖRME</label>
				<label><input type="checkbox" name="eng[]" value="ZİHİNSEL"> ZİHİNSEL</label>
				<label><input type="checkbox" name="eng[]" value="İŞİTME"> İŞİTME</label>
				<label><input type="checkbox" name="eng[]" value="SÜREĞEN HASTALIK"> SÜREĞEN HASTALIK</label>
				<label><input type="checkbox" name="eng[]" value="HASTALIK"> HASTALIK</label>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">ENGEL ORANI : </label>
			<div class="controls">
				<select name="englsvy" id="englsvy">
					<option value="100">100</option><option value="99">99</option><option value="98">98</option><option value="97">97</option><option value="96">96</option><option value="95">95</option><option value="94">94</option><option value="93">93</option><option value="92">92</option><option value="91">91</option><option value="90">90</option><option value="89">89</option><option value="88">88</option><option value="87">87</option><option value="86">86</option><option value="85">85</option><option value="84">84</option><option value="83">83</option><option value="82">82</option><option value="81">81</option><option value="80">80</option><option value="79">79</option><option value="78">78</option><option value="77">77</option><option value="76">76</option><option value="75">75</option><option value="74">74</option><option value="73">73</option><option value="72">72</option><option value="71">71</option><option value="70">70</option><option value="69">69</option><option value="68">68</option><option value="67">67</option><option value="66">66</option><option value="65">65</option><option value="64">64</option><option value="63">63</option><option value="62">62</option><option value="61">61</option><option value="60">60</option><option value="59">59</option><option value="58">58</option><option value="57">57</option><option value="56">56</option><option value="55">55</option><option value="54">54</option><option value="53">53</option><option value="52">52</option><option value="51">51</option><option value="50">50</option><option value="49">49</option><option value="48">48</option><option value="47">47</option><option value="46">46</option><option value="45">45</option><option value="44">44</option><option value="43">43</option><option value="42">42</option><option value="41">41</option><option value="40">40</option></select> %
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">ENGEL SEBEBİ: </label>
				<div class="controls">
					<textarea class="span11" name="engl_sebebi" onkeypress="return BuyukHarf(event);" rows="5"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">O.F'Lİ İSE SEVİYESİ: </label>
				<div class="controls">
					<input type="text" name="of_seviyesi" value="" class="span11" onkeypress="return BuyukHarf(event);" placeholder="OMURİLİK FELÇLİSİ İSE O.F SEVİYESİNİ YAZIN">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">ENGEL AÇIKLAMASI: </label>
				<div class="controls">
					<textarea name="engel_aciklamasi" class="span11" onkeypress="return BuyukHarf(event);" rows="5"></textarea>
				</div>
			</div>
		</div>    
	</div>
	<!-- /ÜYE SAĞLIK BİLGİLERİ FORMU -->