{*
* 2014 jonad.in
* 
*  @author 		Jonathan Delgado Zamorano <jonad.correo@gmail.com>
*  @copyright 	2014 Jonad.in
*  @license 	http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<form action="{$action_form}" method="post">
	<fieldset>
		<legend><img src="{$localPath}/logo.gif" alt="" title="" /> {l s='Settings' mod='productcommentsdisqus'}</legend>
		<label>{l s='Your Disqus shortname' mod='productcommentsdisqus'}</label>
		<div class="margin-form">
			<input type="text" value="{$shortname_product}" name="shortname">
		</div>
		<center><input type="submit" name="submitCross" value="{l s='Save' mod='productcommentsdisqus'}" class="button" /></center>
	</fieldset>
</form>