{*
* 2014 jonad.in
* 
*  @author 		Jonathan Delgado Zamorano <jonad.correo@gmail.com>
*  @copyright 	2014 Jonad.in
*  @license 	http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<div id="disqus_thread"></div>
<script type="text/javascript">
    var disqus_shortname = '{$shortname_product}';

    (function() {literal}{{/literal}
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        var s = document.createElement('script'); s.async = true; s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    {literal}}{/literal})();
</script>