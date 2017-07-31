@extends('layouts.admin')

@section('title', $title)

@section('content')

<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading text-center">Edit existing post</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-3 control-label">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" required>

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="col-md-3 control-label">Image</label>

                    <div class="col-md-6">
                        <!--<input id="image" type="file" name="image" accept="image/jpeg,image/jpg,image/png,image/svg,image/gif" required>-->

                        <div class="image-upload">
                            <label for="file-input">
                                <img class="img-responsive" id="blah" src="/img/posts/{{ $post->image }}" alt="Click to change image" style="max-width: 256px; max-height: 128px;" />
                            </label>

                            <input id="file-input" type="file" name="image" accept="image/jpeg,image/jpg,image/png,image/svg,image/gif">
                        </div>

                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                    <label for="text" class="col-md-3 control-label">Text</label>

                    <div class="col-md-8">
                        <textarea id="text" name="text" class="form-control" rows="10" required>{{ $post->text }}</textarea>

                        @if ($errors->has('text'))
                            <span class="help-block">
                                <strong>{{ public_path('img/posts/' . $errors->first('text')) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('text');
</script>

@endsection