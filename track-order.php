<?php require_once 'includes/header.php'; ?>

<!-- ===== PAGE HEADER ===== -->
<section class="page-header">
    <div class="container">
        <h1>Track Your Order</h1>
        <p>Enter your order ID and email to get the latest status</p>
    </div>
</section>

<!-- ===== TRACK ORDER FORM ===== -->
<section class="track-section">
    <div class="container">
        <div class="track-form-wrapper">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="order_id">Order ID</label>
                    <input type="text" id="order_id" name="order_id" placeholder="e.g. #HW12345" required />
                </div>
                <div class="form-group">
                    <label for="track_email">Email Address</label>
                    <input type="email" id="track_email" name="track_email" placeholder="you@example.com" required />
                </div>
                <button type="submit" class="btn btn-primary">Track Order</button>
            </form>
        </div>

        <!-- Dummy tracking result (shown only after submit) -->
        <div class="track-result" style="display: none;">
            <h3>Order Status</h3>
            <div class="status-timeline">
                <div class="status-step active"><span>Order Placed</span></div>
                <div class="status-step active"><span>Processing</span></div>
                <div class="status-step"><span>Shipped</span></div>
                <div class="status-step"><span>Delivered</span></div>
            </div>
            <p><strong>Estimated Delivery:</strong> 2–3 business days</p>
            <p><strong>Tracking ID:</strong> HW12345IND</p>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>