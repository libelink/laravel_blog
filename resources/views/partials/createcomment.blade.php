<div class="content columns">
    <div class="column is-three-fifths">
        <form method="POST" action="{{url("/home/admin/comment/store/{$post->id}")}}">
            @csrf
            <div class="field is-grouped">
                <p class="control is-expanded">
                    <input type="text" name="comment" class="input" @error('comment') is-danger @enderror placeholder="Your comment here..." id="content"/>
                    @error('comment') <p class="help is-danger">{{$errors->first('comment')}}</p>@enderror
                </p>
                <p class="control">
                    <input type="submit" value="submit">
                </p>
            </div>
        </form>
    </div>
</div>

