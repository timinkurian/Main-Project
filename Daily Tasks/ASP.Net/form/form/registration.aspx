<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="registration.aspx.cs" Inherits="form.registration" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <style type="text/css">
        .auto-style1 {
            width: 100%;
        }
        .auto-style2 {
        }
        .auto-style3 {
            width: 265px;
        }
        .auto-style4 {
            height: 23px;
        }
        .auto-style5 {
            width: 122px;
            height: 19px;
            position: absolute;
            left: 424px;
            top: 22px;
            font-size: medium;
        }
        .auto-style6 {
            height: 23px;
        }
        .auto-style7 {
            width: 265px;
            height: 23px;
        }
        .auto-style8 {
            width: 271px;
            height: 56px;
        }
        .auto-style9 {
            width: 265px;
            height: 56px;
        }
        .auto-style10 {
            width: 271px;
            height: 26px;
        }
        .auto-style11 {
            width: 265px;
            height: 26px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
        <table class="auto-style1">
            <tr>
                <td class="auto-style4" colspan="2"><strong class="auto-style5">REGISTRATION</strong></td>
            </tr>
            <tr>
                <td class="auto-style2">Name</td>
                <td class="auto-style3">
                    <asp:TextBox ID="TextBox1" runat="server" Width="169px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style2">Address</td>
                <td class="auto-style3">
                    <asp:TextBox ID="TextBox2" runat="server" TextMode="MultiLine"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style8">Gender</td>
                <td class="auto-style9">
                    <asp:RadioButtonList ID="RadioButtonList1" runat="server" Height="16px" RepeatDirection="Horizontal" Width="178px">
                        <asp:ListItem>Male</asp:ListItem>
                        <asp:ListItem>Female</asp:ListItem>
                    </asp:RadioButtonList>
                </td>
            </tr>
            <tr>
                <td class="auto-style2">Course</td>
                <td class="auto-style3">
                    <asp:DropDownList ID="DropDownList1" runat="server" OnSelectedIndexChanged="DropDownList1_SelectedIndexChanged" Width="187px">
                        <asp:ListItem>MCA</asp:ListItem>
                        <asp:ListItem>Mtech</asp:ListItem>
                        <asp:ListItem>BTech</asp:ListItem>
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="auto-style4">Email</td>
                <td class="auto-style7">
                    <asp:TextBox ID="TextBox3" runat="server" Width="177px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style2">Username</td>
                <td class="auto-style3">
                    <asp:TextBox ID="TextBox4" runat="server" Width="177px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style10">Password</td>
                <td class="auto-style11">
                    <asp:TextBox ID="TextBox5" runat="server" TextMode="Password" Width="177px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style6">Confirm Password</td>
                <td class="auto-style7">
                    <asp:TextBox ID="TextBox6" runat="server" TextMode="Password" Width="180px"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="auto-style4" colspan="2">
                    <asp:CheckBox ID="CheckBox1" runat="server" Text="I here by declare all the above details are correct" />
                </td>
            </tr>
            <tr>
                <td class="auto-style4" colspan="2">
                    <asp:Button ID="Button1" runat="server" style="z-index: 1; left: 457px; top: 326px; position: absolute; text-align: center; font-weight: 700" Text="Submit" />
                </td>
            </tr>
            <tr>
                <td class="auto-style2">&nbsp;</td>
                <td class="auto-style3">&nbsp;</td>
            </tr>
        </table>
    <div>
    
    </div>
    </form>
</body>
</html>
