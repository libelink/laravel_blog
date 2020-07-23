<div class="content columns">
    <div class="column is-three-fifths is-offset-one-fifth">
        <form method="POST" action="{{url("/home/comment/store/{$post->id}")}}">
            @csrf
            <label for="title">Titre : </label><br/>
            <input type="text" name="subject" class="input @error('subject') is-danger @enderror" placeholder="subject" id="subject"> <br/>
            @error('subject') <p class="help is-danger">{{$errors->first('subject')}}</p>@enderror
            <label for="content">Contenu : </label><br/>
            <textarea name="comment" class="textarea @error('comment') is-danger @enderror" placeholder="comment" id="content" rows="5" cols="33"></textarea>
            @error('comment') <p class="help is-danger">{{$errors->first('comment')}}</p>@enderror
            <input type="submit" value="submit">
        </form>
    </div>
</div>

