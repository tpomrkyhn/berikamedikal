
<?php

if(!session("login")){ $ssayfa = "giris"; }

switch ($ssayfa) {

    case "ayarlar":

        echo '<!-- Theme JS files -->
  <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform' . $dil . '.min.js"></script>

  <script type="text/javascript" src="assets/js/core/app.js"></script>
  <script type="text/javascript" src="assets/js/pages/form_inputs.js"></script>
  <!-- /theme JS files --><!-- Theme JS files -->
  <script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/forms/selects/select2' . $dil . '.min.js"></script>

  <script type="text/javascript" src="assets/js/core/app.js"></script>
  <script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
  <!-- /theme JS files -->	<!-- Theme JS files -->
  <script type="text/javascript" src="assets/js/plugins/forms/tags/tagsinput.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/forms/tags/tokenfield.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/ui/prism.min.js"></script>
  <script type="text/javascript" src="assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>

  <script type="text/javascript" src="assets/js/core/app.js"></script>
  <script type="text/javascript" src="assets/js/pages/form_tags_input.js"></script>
  <!-- /theme JS files -->';

        break;

    case "mailgelen":

        echo '<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/mail_list.js"></script>';

        break;

    case "hareketliste":

        echo '<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_basic'.$dil.'.js"></script>';

        break;
    case "parcagoruntule":

        echo '<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_basic'.$dil.'.js"></script>';

        break;
        case "parcagrubugoruntule":

        echo '<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_basic'.$dil.'.js"></script>';

        break;

    case "mailgiden":

        echo '<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/mail_list.js"></script>';

        break;

    case "mailyildiz":

        echo '<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/mail_list.js"></script>';

        break;

    case "mailcop":

        echo '<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/mail_list.js"></script>';

        break;

    case "mail":

        echo '<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/mail_list_read.js"></script>
	<!-- /theme JS files -->';

        break;

    case "mailgonder":

        echo '<script type="text/javascript" src="assets/js/plugins/editors/summernote/summernote.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/editors/summernote/lang/summernote-tr-TR.js"></script>
	<script type="text/javascript" src="assets/js/pages/mail_list_write.js"></script>
	<!-- Theme JS files -->
  <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform' . $dil . '.min.js"></script>

  <script type="text/javascript" src="assets/js/core/app.js"></script>
  <script type="text/javascript" src="assets/js/pages/form_inputs.js"></script>
  <script type="text/javascript" src="assets/js/plugins/forms/tags/tagsinput.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/tags/tokenfield.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/prism.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_tags_input.js"></script>
  <!-- /theme JS files -->';

        break;

    case "urun":

        echo '<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/mousewheel.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/globalize.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.de-DE.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.ja-JP.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/jqueryui_forms.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
	
	
	
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/cookie.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_all.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_childcounter.js"></script>
		<script type="text/javascript" src="assets/js/plugins/notifications/pnotify.min.js"></script>


	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>
	';

        break;

    case "parcagrup":

        echo '<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/mousewheel.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/globalize.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.de-DE.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.ja-JP.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/jqueryui_forms.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
	
	
	
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/cookie.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_all.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_childcounter.js"></script>
		<script type="text/javascript" src="assets/js/plugins/notifications/pnotify.min.js"></script>


	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>

	';

    case "tedarikci":

        echo '<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/mousewheel.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/globalize.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.de-DE.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.ja-JP.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/jqueryui_forms.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
	
	
	
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/cookie.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_all.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_childcounter.js"></script>
		<script type="text/javascript" src="assets/js/plugins/notifications/pnotify.min.js"></script>


	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>

	';
    case "hareket":

        echo '<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/mousewheel.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/globalize.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.de-DE.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.ja-JP.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/jqueryui_forms.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
	
	
	
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/cookie.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_all.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_childcounter.js"></script>
		<script type="text/javascript" src="assets/js/plugins/notifications/pnotify.min.js"></script>


	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>

	';

    case "musteri":

        echo '<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/mousewheel.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/globalize.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.de-DE.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.ja-JP.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/jqueryui_forms.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
	
	
	
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/cookie.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_all.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_childcounter.js"></script>
		<script type="text/javascript" src="assets/js/plugins/notifications/pnotify.min.js"></script>


	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>

	';

        break;

    default:

        echo '<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/widgets.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/mousewheel.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/globalize.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.de-DE.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.ja-JP.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/jqueryui_forms.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
	
	
	
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/core.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/extensions/cookie.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_all.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/trees/fancytree_childcounter.js"></script>
		<script type="text/javascript" src="assets/js/plugins/notifications/pnotify.min.js"></script>


	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/extra_trees.js"></script>
';

        break;

}


?>

<style>

    .ui-autocomplete li a {
        overflow: hidden;
        display: block;
        height: 40px;
    }

    .ui-autocomplete li a img {
        float: left;
        margin-right: 10px;
        display: block;
        max-width: 40px;
        max-height: 40px;
    }

    .ui-autocomplete li a .alt {
        display: block;
        font-size: 12px;
        color: #4b4b4b;
    }

    .ui-autocomplete li a .ust {
        display: block;
        font-weight: bold;
        font-size: 14px;
        color: #000;
    }

    .ui-autocomplete-loading {
        background: #fff url(assets/images/loader.gif) right center no-repeat; background-size: 22px 22px;
    }

</style>

<?

$serviceUrl = "http://212.175.180.28/api";
$city = 'KONYA';

$city_info = file_get_contents($serviceUrl.'/merkezler?il='.$city);

$city_info_arr = json_decode($city_info,true);

$sondurumIstNo = $city_info_arr[0]["sondurumIstNo"];

$city_info = file_get_contents($serviceUrl.'/sondurumlar?istno='.$sondurumIstNo);

$bilgiler = json_decode($city_info,true);

$aciklamakod = $bilgiler[0]["hadiseKodu"];

$havadurumu["aciklama"] = $d["HD-".$aciklamakod];
$havadurumu["hadise"] = $aciklamakod;
$sicaklik = $bilgiler[0]["sicaklik"];
$havadurumu["sicaklik"] = round($sicaklik);
$havadurumu["il"] = $city;

?>
