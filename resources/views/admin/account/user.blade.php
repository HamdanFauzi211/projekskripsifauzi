<div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Halaman User</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Pencarian">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Cari</button>
					                    </div>
					                </form>
							    </div>
						    </div>
					    </div>
				    </div>
			    </div>
				
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-center">
										<thead>
											<tr>
												<th class="cell" width="25%" style="text-align:justify;">Nama</th>
												<th class="cell" width="25%" style="text-align:justify;">Username</th>
												<th class="cell" width="25%" style="text-align:justify;">Peran</th>
												<th class="cell" width="25%" style="text-align:justify;"></th>
											</tr>
										</thead>
										<tbody>
										@foreach($user as $u)
											<tr>
												<td class="cell" width="25%" style="text-align:justify;">{{ $u->nama }}</td>
												<td class="cell" width="25%" style="text-align:justify;">{{ $u->username }}</td>
												<td class="cell" width="25%" style="text-align:justify;">{{ $u->role }}</td>
											</tr>
										</tbody>
									</table>
						        </div>
						    </div>	
						</div>
			        </div>
				</div>