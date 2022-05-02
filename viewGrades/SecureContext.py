"""
Author: Gaspard Baye
Github: bayegaspard
"""
from secureStrategy import *

class SecureChecks():
    def secureChecks(Creds):
        return CheckRoles.do_check_roles(CheckCreds.do_creds_checks(Creds))