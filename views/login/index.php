<center><h1>شاشة الدخول</h1></center>

<form id="loginForm">
    <div dir="rtl">
        <label>اسم الدخول</label><input id="loginNm" type="text" name="loginName" /><br>
        <label>كلمة المرور</label><input id="userPassword" type="password" name="password" /><br>
    <div>
    <input id="loginBtn" type="button" data-url="<?php echo URL ?>" value="ادخل"/>
    <div id="loginMessage"></div>
</form>

<script>
    $(function(){
        $("#loginBtn").click(function(){
            try {
                $("#loginMessage").html('');
                //alert("User name: " + $("#loginNm").val());
                //alert($("#loginForm").serialize());
                //var destUrl = $("#loginBtn").attr("data-url") + "login/run";
                var destUrl = "login/run";
                //var destUrl = "index.php";//"login/run";

                var loginParams = {
                        loginName: $("#loginNm").val(), 
                        //password: $("#userPassword").val(),
                        ctrlr: "login",
                        mtd: "run"
                };
                var loginInfo = preparePostParams(loginParams);
                //var loginInfo = "loginName=" + $("#loginNm").val() + "&password=" + $("#userPassword").val();
                alert(loginInfo);
                
                $.ajax({
                    type: "POST",
                    url: destUrl,
                    //contentType: "application/json; charset=utf-8",
                    //data: $("#loginForm").serialize(),
                    data: loginInfo,
                    //dataType: "json",
                })
                .done(function(data) {
                    //alert("Ajax done");
                    //alert(data);
                    if (!data.includes("<script>"))
                        $("#loginMessage").html(data);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    alert("Ajax failed");
                    //var err = eval("(" + jqXHR.responseText + ")");
                    //alert(err.Message);
                    alert(jqXHR.responseText);
                    alert(errorThrown);
                });
            }
            catch(err) {
                alert("Error");
                alert(err.message);
            }
        });
    });

    function preparePostParams(params) {
        var postParams = "";

        for (var k in params) {
            //alert(k); alert(params[k]);
            postParams += k + "=" + params[k] + "&";
        }

        //alert(postParams); alert(postParams.substr(0, postParams.length - 1));

        return postParams.substr(0, postParams.length - 1);
    }
</script>