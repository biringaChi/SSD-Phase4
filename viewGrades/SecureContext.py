"""
Author: Gaspard Baye
Github: bayegaspard
"""
from secureStrategy import *

class SecureChecks():
    """Secure context to perform checks!!"""
    def secureChecks(Creds):
        """method to actually perform checks"""
        return CheckRoles.do_check_roles(CheckCreds.do_creds_checks(Creds))
