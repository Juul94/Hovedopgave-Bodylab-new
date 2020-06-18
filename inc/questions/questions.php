
<form id="form_question" method="POST" action="inc/questions/update.php">
	
	<div class="modal fade" id="open_question" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				
				<div id="crossClose" title="Luk"></div>
				
				<?php
					$email = $_SESSION['email'];
					$getQuery = $_GET['question'];
				
					$query = "SELECT * FROM users WHERE email='$email'";

					$result = mysqli_query($conn, $query);

					while($row = mysqli_fetch_assoc($result)) {
						
						if($getQuery == '1' && $row['advent1'] != '0') {
							echo '<script>
								$(document).ready(function() {
									$("#crossClose").css("display", "block");
								});
							  </script>';
						}
						
						if($getQuery == '2' && $row['advent2'] != '0') {
							echo '<script>
								$(document).ready(function() {
									$("#crossClose").css("display", "block");
								});
							  </script>';
						}
						
						if($getQuery == '3' && $row['advent3'] != '0') {
							echo '<script>
								$(document).ready(function() {
									$("#crossClose").css("display", "block");
								});
							  </script>';
						}
						
						if($getQuery == '4' && $row['advent4'] != '0') {
							echo '<script>
								$(document).ready(function() {
									$("#crossClose").css("display", "block");
								});
							  </script>';
						}
						
						
						
					}
								
					$getQuery = $_GET['question'];

					$query = "SELECT * FROM questions INNER JOIN answers ON questions.id = answers.answer_fk WHERE questions.id = '$getQuery'";

					$result = mysqli_query($conn, $query);

					while($row = mysqli_fetch_assoc($result)) {
				?>

				<div class="modal-header">
					<h4 class="modal-title dark" id="ModalLabel"><?php echo $row['id'] ?>. Advent - Konkurrence</h5>
				</div>

				<div class="modal-body">
					<div class="container">
						<h5 class="dark"><?php echo $row['question'] ?></h3>

						<ol class="question">

							<div class="row mb-3 padding10 grey-bg checked">
								<div class="col-md-10 col-sm-12">

									<div class="row">
										<div class="col-md-2 col-sm-12">
											<span class="questionLetter">A</span>
										</div>

										<div class="col-md-10 col-sm-12">
											<label class="dark"><?php echo $row['answer1']; ?></label>
										</div>
									</div>

								</div>

								<div class="col-md-2 col-sm-12 checkbox_height">
									<label class="container_checkmark">
										<input type="radio" class="sev_check" name="radio" value="A" id="val_a">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>

							<div class="row mb-3 padding10 checked">
								<div class="col-md-10 col-sm-12">

									<div class="row">
										<div class="col-md-2 col-sm-12">
											<span class="questionLetter">B</span>
										</div>

										<div class="col-md-10 col-sm-12">
											<label class="dark"><?php echo $row['answer2']; ?></label>
										</div>

									</div>
								</div>

								<div class="col-md-2 col-sm-12 checkbox_height">
									<label class="container_checkmark">
										<input type="radio" class="sev_check" name="radio" value="B" id="val_b">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>

							<div class="row mb-3 padding10 grey-bg">
								<div class="col-md-10 col-sm-12">

									<div class="row">
										<div class="col-md-2 col-sm-12">
											<span class="questionLetter">C</span>
										</div>

										<div class="col-md-10 col-sm-12">
											<label class="dark"><?php echo $row['answer3']; ?></label>
										</div>
									</div>

								</div>

								<div class="col-md-2 col-sm-12 checkbox_height">
									<label class="container_checkmark">
										<input type="radio" class="sev_check" name="radio" value="C" id="val_c">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>

							<div class="row padding10 checked">
								<div class="col-md-10 col-sm-12">

									<div class="row">
										<div class="col-md-2 col-sm-12">
											<span class="questionLetter">D</span>
										</div>

										<div class="col-md-10 col-sm-12">
											<label class="dark"><?php echo $row['answer4']; ?></label>
										</div>
									</div>
								</div>

								<div class="col-md-2 col-sm-12 checkbox_height">
									<label class="container_checkmark">
										<input type="radio" class="sev_check" name="radio" value="D" id="val_d">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>

						</ol>

						<label id="missingCheckbox1" class="error">Vælg venligst dit svar</label>

					</div>
				</div>

				<div class="modal-footer">
					<input type="hidden" name="questions<?php echo $row['id'] ?>" value="1">
					
					<button type="submit" id="dismissModal1" class="btn btn-primary">Deltag</button>
				</div>
				
				<?php } ?>
				
			</div>
		</div>
	</div>
	
</form>

<script>

	$("#crossClose").click(function() {
		var url = "index.php";
		window.location = url;
	});

</script>

<?php
	// CHECK IF THE QUESTION ALREADY IS ANSWERED AND REMEMBERS IT + MAKES IT POSSIBLE TO NOW SUBMIT AGAIN

	$disabled_checkbox = '1';

	if (isset($_GET['question'])) {
		$getQuery = $_GET['question'];
	}

	$query = "SELECT * FROM users WHERE email='$email'";

	$result = mysqli_query($conn, $query);

	while($row = mysqli_fetch_assoc($result)) {

		if($getQuery == '1' && $row['advent1'] != '0') {

			echo '<script>
			$(document).ready(function() {
				var submitBTN = document.querySelector("#dismissModal1");
				submitBTN.innerHTML = "Du deltager allerede";
				submitBTN.style.cursor = "not-allowed";
				submitBTN.disabled = true;
				
				$(".checkmark").hover(function(){	
					$(this).css("cursor", "not-allowed");
				});
			}); </script>';

			if($row['advent1'] == 'A') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").checked = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent1'] == 'B') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").checked = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent1'] == 'C') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").checked = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent1'] == 'D') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").checked = true;
						});
					  </script>';
			}

		}

		if($getQuery == '2' && $row['advent2'] != '0') {

			echo '<script>
			$(document).ready(function() {
				var submitBTN = document.querySelector("#dismissModal1");
				submitBTN.innerHTML = "Du deltager allerede";
				submitBTN.style.cursor = "not-allowed";
				submitBTN.disabled = true;
				
				$(".checkmark").hover(function(){	
					$(this).css("cursor", "not-allowed");
				});
			}); </script>';

			if($row['advent2'] == 'A') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").checked = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent2'] == 'B') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").checked = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent2'] == 'C') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").checked = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent2'] == 'D') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").checked = true;
						});
					  </script>';
			}
		}

		if($getQuery == '3' && $row['advent3'] != '0') {

			echo '<script>
			$(document).ready(function() {
				var submitBTN = document.querySelector("#dismissModal1");
				submitBTN.innerHTML = "Du deltager allerede";
				submitBTN.style.cursor = "not-allowed";
				submitBTN.disabled = true;
				
				$(".checkmark").hover(function(){	
					$(this).css("cursor", "not-allowed");
				});
			}); </script>';

			if($row['advent3'] == 'A') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").checked = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent3'] == 'B') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").checked = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent3'] == 'C') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").checked = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent3'] == 'D') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").checked = true;
						});
					  </script>';
			}
		}

		if($getQuery == '4' && $row['advent4'] != '0') {

			echo '<script>
			$(document).ready(function() {
				var submitBTN = document.querySelector("#dismissModal1");
				submitBTN.innerHTML = "Du deltager allerede";
				submitBTN.style.cursor = "not-allowed";
				submitBTN.disabled = true;
				
				$(".checkmark").hover(function(){	
					$(this).css("cursor", "not-allowed");
				});
			}); </script>';

			if($row['advent4'] == 'A') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").checked = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent4'] == 'B') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").checked = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent4'] == 'C') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").checked = true;
							document.getElementById("val_d").disabled = true;
						});
					  </script>';
			}

			if($row['advent4'] == 'D') {
				echo '<script>
						$(document).ready(function() {
							document.getElementById("val_a").disabled = true;
							document.getElementById("val_b").disabled = true;
							document.getElementById("val_c").disabled = true;
							document.getElementById("val_d").checked = true;
						});
					  </script>';
			}
		}
	}

	// CHECK IF YOU HAVE OPENED THE PREVIOUS "DOORS"
	$email = $_SESSION['email'];

	if (isset($_GET['question'])) {
		$getQuery = $_GET['question'];
	}

	$query = "SELECT * FROM users WHERE email='$email'";

	$result = mysqli_query($conn, $query);

	while($row = mysqli_fetch_assoc($result)) {
		
		if($getQuery == '2' && $row['advent1'] == '0') {
			header('Location: index.php');
		}
		
		if($getQuery == '3' && $row['advent2'] == '0') {
			header('Location: index.php');
		}

		if($getQuery == '4' && $row['advent3'] == '0') {
			header('Location: index.php');
		}
		
	}

?>


