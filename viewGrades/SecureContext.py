from secureStrategy import *

class SecureChecks():
    def secureChecks(self,Creds):
        return CheckCreds.do_creds_checks(CheckRoles.do_check_roles(Creds))
