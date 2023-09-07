@include('email-template.header')
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
        <td valign="top" class="textContent">
            <h3 style="color:#ff966a;line-height:125%;font-family:Roboto ,Helvetica,Arial,sans-serif;font-size:23px;font-weight:600;margin-top:0;margin-bottom:3px;text-align:center;">Hi {{$name}}!</h3>
            <div style="text-align:center;font-family:Roboto ,Helvetica,Arial,sans-serif;font-size:17px;margin-bottom:0;color:#333333;line-height:135%;">
                mychain welcomes you to be a part of its MLM community. To complete your sign up, please verify your email address by OTP given below.
            </div>
        </td>
    </tr>

    <tr>
        <td style="text-align:center;">
            <div style="text-align:center;font-family:Roboto ,Helvetica,Arial,sans-serif;font-size:17px;margin-bottom:0;color:#ff966a;line-height:135%;font-weight: bold;">{{$otp}}</div>
        </td>
    </tr>

    <!--<tr>
         <td style="text-align:center;">
            <a href="" target="_blank"><span style="display:inline-block;
               background:#fb0;
               border-radius: 8px;
               color: #103464;
               font-size: 18px;
               padding: 10px 15px;
               margin: 30px auto 0;
               text-decoration: none;
               text-align: center;
               ">Click here to verify email</span></a>
        </td>
    </tr>-->
    <tr>
        <td valign="top" class="textContent">
            <div style="text-align:center;font-family:Roboto ,Helvetica,Arial,sans-serif;font-size:17px;margin-bottom:0;color:#333;line-height:135%;">
                <p>  Please keep in mind that the link will expire in 24 hours. If you have not signed up at mychain.com, then kindly ignore this message.</p>
            </div>
        </td>
    </tr>

    </tbody>
</table>
@include('email-template.footer')
