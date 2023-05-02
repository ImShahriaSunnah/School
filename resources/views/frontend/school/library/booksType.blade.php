


<main class="page-content">


  <form action="{{route('books.type.post')}}" method="post">
    @csrf

    <div>
      <label for="">Book Type</label>
      <input type="book_type" placeholder="Book Type" value="{{old('book_type')}}" class="form-control" required name="book_type">

    </div>


    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
 </form>



</main>
