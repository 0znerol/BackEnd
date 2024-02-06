<?php 

?>
<div class="row align-content-center">
<h1 class="text-center">Create Post</h1>
<form action="createPost.php" method="POST" class="w-75 m-auto border rounded p-2">
         <div class="mb-3">
                 <label for="postTitle" class="form-label">Title</label>
                 <input type="text" class="form-control" id="postTitle" name="postTitle" aria-describedby="postTitle">
         </div>
         <div class="mb-3">
                 <label for="postBody" class="form-label">Post</label>
                 <input type="postBody" class="form-control" id="postBody" name="postBody" aria-describedby="postBody">
         </div>
         <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
         <button type="submit" value="Submit" class="btn btn-success">Submit</button>
 </form>
 </div>