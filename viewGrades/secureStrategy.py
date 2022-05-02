
class CheckCreds():
    """Strategy to check users roles for validation"""
    def do_creds_checks(Creds):
        print("performing user credential checks ....")
        if str(Creds[0])=="admin" and str(Creds[1])=="admin":
            return "admin"
        elif str(Creds[0])=="student" and str(Creds[1])=="student":
            return "student"
        elif str(Creds[0])=="faculty" and str(Creds[1])=="faculty":
            return "faculty"
        else:
            return "notLoggedIn"

class CheckRoles():
    """Strategy to check users roles for validation"""
    def do_check_roles(user):
        "Method to check roles"
        print(f"Checking role for {user} ......")
        if str(user) == "admin":
            return "admin"
        elif str(user) == "student":
            return "student"
        elif str(user)=="faculty":
            return "faculty"
        else:
            return "Not a valid user !"

# Creds = ['admin','admin']
# print(type(CheckCreds.do_creds_checks(Creds)))