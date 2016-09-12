@extends('app')

@section('header')
    @include('headers.article')
@endsection

@section('content')
    <div class="row">
        <article class="article col-xs-12">
            <div class="article-description">
                {!! $post->content !!}
            </div>
        </article>
        <div class="col-xs-12" id="comments">
            @if(count($post->comments) > 0)
                <h3 class="page-header">Comments</h3>
                @foreach($post->comments as $comment)
                    <div data-comment="{{ $comment->id }}" class="comment row">
                        <div class="col-xs-2">
                            <img src="https://randomuser.me/api/portraits/men/60.jpg" alt="My avatar"
                                 class="img-responsive user-avatar">
                        </div>
                        <div class="col-xs-10">
                            <h4>{{ $comment->user->name }}
                                <span class="pull-right" data-toggle="tooltip"
                                      title="{{ $comment->created_at->format('d. m. Y H:i') }}"
                                      data-placement="bottom">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </h4>
                            <div class="comment-content" id="comment-{{ $comment->id }}"
                                 data-content-id="{{ $comment->id }}">
                                {!! checkForUser($comment->content) !!}
                            </div>
                            @if(Auth::check() && Auth::user()->id == $comment->user->id)
                                <div class="actions">
                                    <span class="btn btn--bg-success btn--border-success pointer save hidden"
                                          onclick="saveComment({{ $comment->id }})">Save comment</span>
                                    <span class="btn btn--bg-blue btn--border-blue pointer"
                                          onclick="editComment({{ $comment->id }})">Edit comment</span>
                                    <span class="btn btn--bg-danger btn--border-danger pointer"
                                          onclick="deleteComment({{ $comment->id }})">Delete comment</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
            @endif
            @if(Auth::check())
                <h3 class="page-title">Leave a comment</h3>
                <div class="leave-comment">
                    {!! Form::open(['url' => 'comments', 'method' => 'POST']) !!}
                    {!! Form::hidden('slug', $post->slug) !!}
                    <div class='form-group'>
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit("Leave a comment", ['class' => 'btn btn--bg-success btn--border-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            @endif
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{!! asset("/vendor/prism/prism.css") !!}"/>
@endsection

@section('scripts')
    @if(Auth::check())
        <script>
            function closeComment() {
                $("#edit-comment").modal('hide');
            }

            function saveComment(id) {
                var content = tinymce.get('comment-' + id).getContent();
                $.ajax({
                    url: '/comments/' + id,
                    type: 'PATCH',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'content': content
                    },
                    success: function (response) {
                        if (response === "success") {
                            content = content.replace(/@(\w+)/g, "<a href='/users/$1'>@$1</a>");
                            tinymce.get('comment-' + id).remove();
                            $("[data-comment=" + id + "]>.col-xs-10>.actions>span").show();
                            $("[data-comment=" + id + "]>.col-xs-10>.actions>span.save").hide().css("display", "none !important");
                            $("div[data-content-id=" + id + "]").attr('aria-hidden', false).html(content);
                            Prism.highlightAll();
                        } else {
                            $(".container").prepend("<div class='alert alert-danger'><p>" + response + "</p></div>");
                        }
                    }
                });
                closeComment();
            }

            function editComment(id) {
                $.ajax({
                    url: '/comments/' + id + '/edit',
                    type: 'GET',
                    data: {'_token': '{{ csrf_token() }}'},
                    success: function (response) {
                        if (response) {
                            tinymce.init({
                                selector: '#comment-' + id,
                                plugins: [
                                    'advlist autolink lists link image charmap preview searchreplace visualblocks fullscreen insertdatetime media table contextmenu paste codesample'
                                ],
                                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample',
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
                                height: "150"
                            });
                            tinymce.get('comment-' + id).setContent(response.content);
                            $("[data-comment=" + id + "]>.col-xs-10>.actions>span").hide();
                            $("[data-comment=" + id + "]>.col-xs-10>.actions>span.save").show().removeClass('hidden').css({
                                display: "block",
                                marginTop: "10px"
                            });
                        } else {
                            $(".container").prepend("<div class='alert alert-danger'><p>" + response + "</p></div>")
                        }
                    }
                });
            }

            function deleteComment(id) {
                $.ajax({
                    url: '/comments/' + id,
                    type: 'DELETE',
                    data: {'_token': '{{ csrf_token() }}'},
                    success: function (response) {
                        if (response === "success") {
                            $("div[data-comment=" + id + "]").remove();
                        } else {
                            // TODO Extract to function
                            $(".container").prepend("<div class='alert alert-danger'><p>" + response + "</p></div>");
                        }
                    }
                });
            }
        </script>
        @include('includes.tinymce_limited')
    @endif
    <script src="{!! asset('/vendor/prism/prism.js') !!}"></script>
    <script>
        $("[data-toggle=tooltip]").tooltip();
    </script>
@endsection