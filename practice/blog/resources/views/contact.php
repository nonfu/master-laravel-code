<?php include 'header.php';?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('/image/contact.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>联系我</h1>
                    <span class="subheading">你有问题？我有答案。</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>你可以通过填写并提交下面的表单给我发送反馈消息，我会尽快给你回复!</p>
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>用户名</label>
                        <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="请输入你的用户名">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>邮箱地址</label>
                        <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="请输入你的邮箱">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>手机号码</label>
                        <input type="tel" class="form-control" placeholder="Phone" id="phone" required data-validation-required-message="请输入你的手机号码">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>消息内容</label>
                        <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="请输入你要发聩的消息内容"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <button type="submit" class="btn btn-primary" id="sendMessageButton">发送</button>
            </form>
        </div>
    </div>
</div>

<hr>

<?php include 'footer.php';?>
<script src="/js/contact.js"></script>

</body>

</html>
