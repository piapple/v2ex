<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
function getJson() {
		  $.getJSON("http://api.duoshuo.com/sites/listTopThreads.json?short_name=testzhike", function(json) {
		            if (json){
		            	 $.each(json, function(index, array) {
		            	 	var str = "<div class='' style=''>"+array['thread_id']+"</div>";  
		            	 	
		            	 	$("#content").append(str);
		            	 });
		            }
		        });
}
		  getJson();
</script>
