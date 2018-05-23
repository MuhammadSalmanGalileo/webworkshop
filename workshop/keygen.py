
import datetime
import hashlib
import argparse

# argument parse
parser = argparse.ArgumentParser(description='Generate Key to register workshop web admin...')
#add argument password mandatory
parser.add_argument('password', metavar='PASSWORD', type=str, nargs=1,
                    help='password to generate key')
args = parser.parse_args()

today = datetime.date.today()
data = str(args.password[0])+str(today.strftime('%d/%m/%y'))

print(hashlib.md5(data.encode('utf-8')).hexdigest())