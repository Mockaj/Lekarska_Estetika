$(function() {
    // Bootstrap
    $('#bootstrap-editor').wysihtml5();

    // Ckeditor standard
    $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
		{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]});
    $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
});

// Tiny MCE
tinymce.init({
    selector: "#tinymce_bbasic",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"


});

tinymce.init({
    mode: "specific_textareas",
    selector: "#tinymce_basic",
    language : 'en',
    height : 300,
    menubar : false,
    plugins: "textcolor, link, image, code, responsivefilemanager, paste",
    toolbar: "undo redo | removeformat | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | forecolor backcolor | bullist numlist outdent indent | link unlink | image responsivefilemanager | code",
    image_advtab: true,
    link_class_list: [
        { title: 'None', value: '' },
        { title: 'Lightbox', value: 'lightbox' }
    ],

    external_filemanager_path:"/filemanager/",
    filemanager_title:"Responsive Filemanager",
    external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
});




// Tiny MCE
tinymce.init({
    selector: "#tinymce_full",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});