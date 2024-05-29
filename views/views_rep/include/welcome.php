
<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Welcome <?php echo $_SESSION['user_']['name']; ?></h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="Dashboard" class="text-muted text-hover-primary">Home</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-400 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">Dashboards</li>
											<!--end::Item-->
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page title-->
									<!--begin::Actions-->
									<div class="d-flex align-items-center gap-2 gap-lg-3">
									<!--
										<a href="UserUploadedDocument@<?php echo base64_encode($user['email']).'$'.base64_encode($_SESSION['secret']); ?>" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary" ><font color="#ff0000"><strong>Completed:</strong></font></a>
										
										<a href="UserUploadedDocument@<?php echo base64_encode($user['email']).'$'.base64_encode($_SESSION['secret']); ?>" class="btn btn-sm fw-bold btn-primary"><?php echo $_SESSION['user_']['stage']; ?></a>
									-->
									</div>
									<!--end::Actions-->
