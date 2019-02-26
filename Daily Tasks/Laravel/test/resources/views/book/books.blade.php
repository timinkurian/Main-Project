<form method="post" action="{{route('book.store')}}">
@csrf
Title:
<input type="text" name=title></br>
Body:
<input type="text" name="body"></br>
<input type="submit" name="submit">
</form>    
