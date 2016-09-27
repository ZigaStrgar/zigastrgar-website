<script src="{!! asset("/vendor/tinymce/tinymce.min.js") !!}"></script>
<script>
    tinymce.init({
        selector: "textarea#content",  // change this value according to your HTML
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code codesample'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code codesample',
        rel_list: [
            {title: 'None', value: ''},
            {title: 'New window', value: 'noreffer noopener'},
        ],
        codesample_languages: [
            {text: 'HTML/XML', value: 'markup'},
            {text: 'PHP', value: 'php'},
            {text: 'SQL', value: 'sql'},
            {text: 'Python', value: 'python'},
            {text: 'Swift', value: 'swift'},
            {text: 'SCSS', value: 'scss'},
            {text: 'CSS', value: 'css'},
            {text: 'JavaScript', value: 'javascript'},
            {text: 'Ruby', value: 'ruby'},
            {text: 'Java', value: 'java'},
            {text: 'JSON', value: 'json'},
            {text: 'Less', value: 'less'},
            {text: 'Bash', value: 'bash'},
            {text: 'React JSX', value: 'jsx'},
            {text: 'C', value: 'c'},
            {text: 'C#', value: 'csharp'},
            {text: 'C++', value: 'cpp'},
            {text: 'Apache config', value: 'apacheconf'},
            {text: 'HTTP', value: 'http'},
            {text: 'Markdown', value: 'markdown'},
        ],
        removeformat: [
            {selector: 'p', attributes: ['style'], split: true, expand: false, deep: true},
        ]
    });
</script>