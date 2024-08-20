<form action="{{ route('admin.updateLogo', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="logo">Restaurant Logo</label>
        <input type="file" name="logo" id="logo" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Upload Logo</button>
</form>
