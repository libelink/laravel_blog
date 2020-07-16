<div class="content columns">
    <div class="column is-three-fifths is-offset-one-fifth">
        <form method="POST" action="{{url("/home/comment/store/{$post->id}")}}">
            @csrf
            <label for="title">Titre : </label><br/>
            <input type="text" name="subject" class="input" placeholder="Titre" id="title" required> <br/>
            <label for="content">Contenu : </label><br/>
            <textarea name="comment" class="textarea" placeholder="article" id="content" rows="5" cols="33" required></textarea>
            <input type="submit" value="submit">
        </form>
    </div>
</div>

