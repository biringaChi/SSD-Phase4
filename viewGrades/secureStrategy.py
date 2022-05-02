
class CheckCreds():
    """Strategy to check users roles for validation"""
    def do_creds_checks(self,Creds):
        if Creds[0]==None and Creds[1]==None:
            return "notLoggedIn"
        elif Creds[0]=="admin" and Creds[1]=="admin":
            return "admin"
        elif Creds[0]=="student" and Creds[1]=="student":
            return "student"
        elif Creds[0]=="faculty" and Creds[1]=="faculty":
            return "faculty"
        else:
            return "Unknown error !"

class CheckRoles():
    """Strategy to check users roles for validation"""
    def do_check_roles(self, user):
        "Method to check roles"
        print(f"Checking role for {user}.")
        if user == "admin":
            return "admin"
        elif user == "student":
            return "student"
        elif user=="faculty":
            return "faculty"
        else:
            return "Not a valid user !"