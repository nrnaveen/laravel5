$(document).ready(function(){
      // tinymce.init({
      //      selector: "textarea"
      // });
	tinymce.init({
		selector: "textarea",
		plugins: [
		"advlist autolink lists link image charmap print preview anchor",
		"searchreplace visualblocks code fullscreen",
		"insertdatetime media table contextmenu paste jbimages"],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
		relative_urls: false
	});
});