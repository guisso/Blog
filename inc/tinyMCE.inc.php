<script src="https://cdn.tiny.cloud/1/(!!!)SUA_CHAVE_AQUI(!!!)/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea.editor',
        content_style: '@import url(\'https://fonts.googleapis.com/css2?family=Oregano&display=swap\'); body{font-family: \'Oregano\', cursive; font-size:1.35em;}',
        plugins: 'a11ychecker advcode casechange codesample formatpainter image link linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
        toolbar: 'a11ycheck addcomment codesample casechange checklist code formatpainter image link pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'
    });

    tinyMCE.init({
        selector: 'textarea.editordisabled',
        body_class: 'textarea.editordisabled',
        readonly: 1
    });

</script>