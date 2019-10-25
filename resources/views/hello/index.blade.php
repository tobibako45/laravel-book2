<form action="/hello/other" method="post"
      enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <input type="submit">
</form>
