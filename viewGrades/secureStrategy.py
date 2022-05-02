"""
Author: Gaspard Baye
Github: bayegaspard
"""
import emoji
class CheckCreds():
    """Strategy to check users roles for validation"""
    def do_creds_checks(Creds):
        print(emoji.emoji.emojize("performing user credential checks :stopwatch:...."))
        if str(Creds[0])=="admin" and str(Creds[1])=="admin":
            print(emoji.emojize("Welcome admin :man_technologist:"))
            return "admin"
        elif str(Creds[0])=="student" and str(Creds[1])=="student":
            print(emoji.emojize("Welcome student :man_student:"))
            return "student"
        elif str(Creds[0])=="faculty" and str(Creds[1])=="faculty":
            print(emoji.emojize("Welcome faculty :teacher:"))
            return "faculty"
        else:
            print(emoji.emojize("Please use a valid credential :thinking_face:"))
            return "notLoggedIn"

class CheckRoles():
    """Strategy to check users roles for validation"""
    def do_check_roles(user):
        "Method to check roles"
        print(emoji.emojize(f"Checking role for {user}  :stopwatch:......"))
        if str(user) == "admin":
            return "admin"
        elif str(user) == "student":
            return "student"
        elif str(user)=="faculty":
            return "faculty"
        else:
            return "Not a valid user !"

# Creds = ['','faculty']
# print(type(CheckCreds.do_creds_checks(Creds)))