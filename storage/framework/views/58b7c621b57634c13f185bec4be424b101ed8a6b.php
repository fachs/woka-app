

<?php $__env->startSection('container'); ?>
<div class="container">
		<div class="row mt-5">
			<div class="col-lg col-sm-12">
				<div class="row ms-3 me-3">
					<a href="<?php echo e(url('/new')); ?>" style="color: black;">
						<div class="box flex">
							<p><b><i class="bi bi-plus-circle-fill" style="font-size: larger;"></i> Tawarkan jasa baru</b></p>   
						</div>
					</a>
				</div>
				<div class="row mt-5 ms-3 me-3">
					<div class="box">
						<h6><b>Terima Pesanan Baru</b></h6>
						<div class="row mt-5">
							<p>Pesanan Selesai</p>
							<div class="progress">
								<div class="progress-bar bg-proses1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="row mt-4">
							<p>Pesanan Selesai Tepat Waktu</p>
							<div class="progress">
								<div class="progress-bar bg-proses2" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="row mt-4">
							<p>Kecepatan Respon</p>
							<div class="progress">
								<div class="progress-bar bg-proses3" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="row mt-5 mb-5 ms-3 me-3">
					<div class="box">
						<h6><b>Kotak Masuk</b></h6>
						<div class="row mt-4">
							<div class="col-lg-2">
								<img src="<?php echo e(asset('img/')); ?>/profile.PNG" class="rounded-circle" width="50px" alt="">
							</div>
							<div class="col-lg">
								<p>
									<b>Karen</b> mengirim anda sebuah pesan singkat
									<br>
									<span style="color: #b5b5b5;">
										Mar 01
									</span>
								</p>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-lg-2">
								<img src="<?php echo e(asset('img/')); ?>/profile.PNG" class="rounded-circle" width="50px" alt="">
							</div>
							<div class="col-lg">
								<p>
									<b>Ulrich</b> mengirim anda sebuah pesan singkat
									<br>
									<span style="color: #b5b5b5;">
										Mar 02
									</span>
								</p>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-lg-2">
								<img src="<?php echo e(asset('img/')); ?>/profile.PNG" class="rounded-circle" width="50px" alt="">
							</div>
							<div class="col-lg">
								<p>
									<b>Luigi</b> mengirim anda sebuah pesan singkat
									<br>
									<span style="color: #b5b5b5;">
										Mar 03
									</span>
								</p>
							</div>
						</div>
					</div>
				</div> -->
			</div>

			<div class="col-lg col-sm-12">
				<div class="row ms-3 me-3">
					<div class="box">
						<table width="100%" cellpadding="5" class="mt-4 mb-2" style="font-size: 12px; text-align: center;">
							<thead>
								<th>Selesai</th>
								<th>Sedang diproses</th>
								<th>Menunggu konfirmasi</th>
							</thead>
							<tr>
								<td><?php echo $ord_selesai->count(); ?></td>
								<td><?php echo $ord_proses->count(); ?></td>
								<td><?php echo $ord_menunggu->count(); ?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="row mt-5 mb-5 ms-3 me-3">
					<div class="box">
						<p><b>Menunggu Konfirmasi</b></p>
						<?php $i = 0; ?>
						<?php foreach ($ord_menunggu as $ord_wait) : ?>
						<?php $i++; ?>
						<?php if($i < 4): ?>
						<form action="<?php echo e(url('/order')); ?>" method="post">
						<?php echo method_field('patch'); ?>
                		<?php echo csrf_field(); ?>
						<div class="row mt-5 me-3">
							<div class="col-lg col-sm-2">
								<img src="<?php echo e(asset('img/')); ?>/Chainsaw-Wood-Cutting-Tools.jpg" width="150px" class="rounded" alt="">
							</div>
							<div class="col-lg col-sm">
								<p style="font-size: 13px;">
									<!-- <b>Nama Jasa</b> <br>
									Keterangan Pemesanan <br> -->
									No. <?php echo e($ord_wait->order_number); ?>

								</p>
							</div>
							<div class="col-lg col-sm">
								<input type="text" name="ord_id" value="<?php echo e($ord_wait->id); ?>" hidden>
								<button class="btn bg-proses2 float-end" style="font-size: 13px;" name="status" value="Terima" type="submit">Terima</button>
								<br><br>
								<button class="btn btn-danger float-end" style="font-size: 13px;" name="status" value="Tolak" type="submit">Tolak</button>
							
							</div>
						</div>
						</form>
						<hr>
						<?php endif; ?>
						<?php endforeach; ?>

					</div>
				</div>
				<div class="row mt-5 mb-5 ms-3 me-3">
					<div class="box">
						<p><b>Dalam Proses</b></p>
						<?php $i = 0; ?>
						<?php foreach ($ord_proses as $ord_process) : ?>
						<?php $i++; ?>
						<?php if($i < 4): ?>
						<div class="row mt-5 me-3">
							<div class="col-lg col-sm-2">
								<img src="<?php echo e(asset('img/')); ?>/Chainsaw-Wood-Cutting-Tools.jpg" width="150px" class="rounded" alt="">
							</div>
							<div class="col-lg col-sm">
								<p style="font-size: 13px;">
									<!-- <b>Nama Jasa</b> <br>
									Keterangan Pemesanan <br> -->
									No. <?php echo e($ord_process->order_number); ?>

								</p>
							</div>
							<div class="col-lg col-sm">
								<button class="btn bg-proses2 float-end" style="font-size: 13px;" disabled>Dalam Proses</button>
							</div>
						</div>
						<hr>
						<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="row mt-5 mb-5 ms-3 me-3">
					<div class="box">
						<p><b>Selesai</b></p>
						<?php $i = 0; ?>
						<?php foreach ($ord_selesai as $ord_done) : ?>
						<?php $i++; ?>
						<?php if($i < 4): ?>
						<div class="row mt-5 me-3">
							<div class="col-lg col-sm-2">
								<img src="<?php echo e(asset('img/')); ?>/Chainsaw-Wood-Cutting-Tools.jpg" width="150px" class="rounded" alt="">
							</div>
							<div class="col-lg col-sm">
								<p style="font-size: 13px;">
									<!-- <b>Nama Jasa</b> <br>
									Keterangan Pemesanan <br> -->
									No. <?php echo e($ord_done->order_number); ?>

								</p>
							</div>
                            <div class="col-lg col-sm">
								<button class="btn bg-proses2 float-end" style="font-size: 13px;" disabled>Selesai</button>
							</div>
						</div>
						<hr>
						<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/search/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\woka-app - Copy\resources\views/pesanan.blade.php ENDPATH**/ ?>