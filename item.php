<div class="container py-4">
    <div class="row g-4">

      <!-- Pieces Section -->

      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-header bg-primary text-white py-3">
            <h5 class="card-title mb-0 d-flex justify-content-between align-items-center">
              <span><i class="bi bi-grid-3x3-gap me-2"></i><?php echo $productname; ?> Pieces</span>
              <span class="badge bg-white text-primary rounded-pill"><?php echo $total_pen; ?></span>
            </h5>
          </div>
          <div class="card-body bg-light inventory-visual p-4">
            <div class="text-center">
              <div class="d-flex flex-wrap justify-content-center">
                <div class="m-1 bg-primary bg-opacity-25 border border-primary rounded" style="width: 15px; height: 80px;"></div>
                <div class="m-1 bg-primary bg-opacity-50 border border-primary rounded" style="width: 15px; height: 80px;"></div>
                <div class="m-1 bg-primary bg-opacity-75 border border-primary rounded" style="width: 15px; height: 80px;"></div>
                <div class="m-1 bg-primary border border-primary rounded" style="width: 15px; height: 80px;"></div>
                <div class="m-1 bg-primary bg-opacity-75 border border-primary rounded" style="width: 15px; height: 80px;"></div>
                <div class="m-1 bg-primary bg-opacity-50 border border-primary rounded" style="width: 15px; height: 80px;"></div>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                  <span class="badge bg-primary bg-opacity-10 text-primary">Single Unit</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-white border-0 p-3">
            <div class="row g-2">
              <div class="col-6">
                <button class="btn btn-primary w-100" type="button" data-bs-toggle="modal" data-bs-target="#orderPiecesModal_<?php echo $p_id; ?>">
                  <i class="bi bi-cart-plus me-1"></i> Order
                </button>
                <div class="modal fade" id="orderPiecesModal_<?php echo $p_id; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Order Pieces</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="process.php">
                        <input type="hidden" name= "p_id" value="<?php echo $p_id; ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                            <label for="pieceQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="pieces" id="pieceQuantity" min="1" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
              </div>
              <div class="col-6">
                <button class="btn btn-outline-secondary w-100" type="button" data-bs-toggle="modal" data-bs-target="#stockPiecesModal_<?php echo $p_id; ?>">
                  <i class="bi bi-box-arrow-in-down me-1"></i> Stock
                </button>
                <div class="modal fade" id="stockPiecesModal_<?php echo $p_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Stock Pieces</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="input-group" method="post" action="process2.php" >
                        <input type="hidden" name= "p_id" value="<?php echo $p_id; ?>">
                          <div class="mb-3">
                            <label for="piecesQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="pieces" id="piecesQuantity" min="1" required>
                          </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Box Section -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-header bg-success text-white py-3">
            <h5 class="card-title mb-0 d-flex justify-content-between align-items-center">
              <span><i class="bi bi-box me-2"></i><?php echo $productname; ?> Boxes</span>
              <span class="badge bg-white text-success rounded-pill"><?php echo $total_boxes; ?></span>
            </h5>
          </div>
          <div class="card-body bg-light inventory-visual p-4">
            <div class="text-center">
              <div class="d-flex flex-wrap justify-content-center">
                <div class="m-2 bg-success bg-opacity-25 border border-success rounded position-relative" style="width: 60px; height: 40px;">
                  <span class="position-absolute top-50 start-50 translate-middle text-success fw-bold">B</span>
                </div>
                <div class="m-2 bg-success bg-opacity-25 border border-success rounded position-relative" style="width: 60px; height: 40px;">
                  <span class="position-absolute top-50 start-50 translate-middle text-success fw-bold">B</span>
                </div>
                <div class="m-2 bg-success bg-opacity-25 border border-success rounded position-relative" style="width: 60px; height: 40px;">
                  <span class="position-absolute top-50 start-50 translate-middle text-success fw-bold">B</span>
                </div>
                <div class="m-2 bg-success bg-opacity-25 border border-success rounded position-relative" style="width: 60px; height: 40px;">
                  <span class="position-absolute top-50 start-50 translate-middle text-success fw-bold">B</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                  <span class="badge bg-primary bg-opacity-10 text-primary"><?php echo $piecebox?> pieces per box</span>
                </div>
                <div>
                  <span class="badge bg-success"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer bg-white border-0 p-3">
            <div class="row g-2">
              <div class="col-6">
                <button class="btn btn-success w-100" type="button" data-bs-toggle="modal_<?php echo $p_id; ?>" data-bs-target="#orderBoxModal_<?php echo $p_id; ?>">
                  <i class="bi bi-cart-plus me-1"></i> Order
                </button>
                <div class="modal fade" id="orderBoxModal_<?php echo $p_id; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Order Box</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="process.php">
                        <input type="hidden" name= "p_id" value="<?php echo $p_id; ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                            <label for="boxQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="box" id="boxQuantity" min="1" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
              </div>
              <div class="col-6">
                <button class="btn btn-outline-secondary w-100" type="button" data-bs-toggle="modal" data-bs-target="#stockBoxModal__<?php echo $p_id; ?>">
                  <i class="bi bi-box-arrow-in-down me-1"></i> Stock
                </button>
                <div class="modal fade" id="stockBoxModal__<?php echo $p_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Stock Boxes</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                    <form class="input-group" method="post" action="process2.php" >
                    <input type="hidden" name= "p_id" value="<?php echo $p_id; ?>">
                          <div class="mb-3">
                            <label for="boxQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="box" id="boxQuantity" min="1" required>
                          </div> 
                      </div>
                      <div class="modal-footer">
                        <button type="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Case Section -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-header bg-warning text-dark py-3">
            <h5 class="card-title mb-0 d-flex justify-content-between align-items-center">
              <span><i class="bi bi-archive me-2"></i><?php echo $productname; ?> Cases</span>
              <span class="badge bg-dark text-warning rounded-pill"><?php echo $total_cases; ?></span>
            </h5>
          </div>
          <div class="card-body bg-light inventory-visual p-4">
            <div class="text-center">
              <div class="d-flex justify-content-center position-relative">
                <div class="m-2 bg-warning bg-opacity-25 border border-warning rounded position-relative" style="width: 100px; height: 80px; z-index: 2;">
                  <div class="position-absolute top-50 start-50 translate-middle text-warning fw-bold">CASE</div>
                </div>
                <div class="m-2 bg-warning bg-opacity-25 border border-warning rounded position-absolute" style="width: 100px; height: 80px; left: calc(50% - 80px); top: 20px; z-index: 1;"></div>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                  <span class="badge bg-primary bg-opacity-10 text-primary"><?php echo $boxcontainer?> box per container</span>
                </div>

              </div>
            </div>
          </div>
          <div class="card-footer bg-white border-0 p-3">
            <div class="row g-2">
              <div class="col-6">
                <button class="btn btn-warning text-dark w-100" type="button" data-bs-toggle="modal" data-bs-target="#orderCaseModal_<?php echo $p_id; ?>">
                  <i class="bi bi-cart-plus me-1"></i> Order
                </button>
                <div class="modal fade" id="orderCaseModal_<?php echo $p_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Order Case</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="input-group" method="post" action="process.php" >
                        <input type="hidden" name= "p_id" value="<?php echo $p_id; ?>">
                          <div class="mb-3">
                            <label for="caseQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="case" id="caseQuantity" min="1" required>
                          </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <button class="btn btn-outline-secondary w-100" type="button" data-bs-toggle="modal" data-bs-target="#stockCaseModal_<?php echo $p_id; ?>">
                  <i class="bi bi-box-arrow-in-down me-1"></i> Stock
                </button>
                <div class="modal fade" id="stockCaseModal_<?php echo $p_id; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Stock Case</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="input-group" method="post" action="process2.php" >
                        <input type="hidden" name= "p_id" value="<?php echo $p_id; ?>">
                          <div class="mb-3">
                            <label for="caseQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="case" id="caseQuantity" min="1" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>