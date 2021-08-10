<h1 class="ct">編輯會員資料</h1>
<table class="all">
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <button onclick="chkAcc('mem')">檢測帳號</button>
    </td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt">住址

        </td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct"><button onclick="reg()">註冊</button><button onclick="resetForm()">重置</button></div>

