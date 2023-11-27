<?php

if (isset($_POST["submit"]))
{
	$file_name = $_FILES["video"]["tmp_name"];
	// $file_name = $_FILES["video"]["name"];
	$cut_from = $_POST["cut_from"];
	$duration = $_POST["duration"];
	$output_file = $_POST["output_file"];
	
	// $command = "C:/ffmpeg/bin/ffmpeg -i " . $file_name . " -vcodec copy -ss " . $cut_from . " -t " . $duration . " ". $output_file .".mp4";
	// echo exec($command);

	$command = "/usr/local/bin/ffmpeg -i " . $file_name . " -vcodec copy -ss " . $cut_from . " -t " . $duration . " ". $output_file .".mp4";
	// echo $command;
	system($command);
	
}

?>

<link rel="stylesheet" href="bootstrap-darkly.min.css">

<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="offset-md-4 col-md-4">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Video</label>
					<input type="file" name="video" class="form-control" onchange="onFileSelected(this);">
					<video width="500" height="320" id="video" controls></video>
				</div>

				<div class="form-group">
					<label>Cut from</label>
					<input type="text" name="cut_from" class="form-control" placeholder="00:00:00">
				</div>

				<div class="form-group">
					<label>Duration</label>
					<input type="text" name="duration" class="form-control" placeholder="00:00:00">
				</div>

				<div class="form-group">
					<label>Output File Name</label>
					<input type="text" name="output_file" class="form-control" placeholder="Short Video">
				</div>

				<input type="submit" name="submit" class="btn btn-primary" value="Split">

			</form>
		</div>
	</div>
</div>

<script>

	function onFileSelected(self) {
		var file = self.files[0];
		var reader = new FileReader();

		reader.onload = function (event) {
			var src = event.target.result;
			var video = document.getElementById("video");
			video.setAttribute("src", src);
		};

		reader.readAsDataURL(file);
	}

</script>