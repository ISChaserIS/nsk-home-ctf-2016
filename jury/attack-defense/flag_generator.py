#!/usr/bin/pythons
import sys
from random import choice

if len(sys.argv) < 3:
  print("Usage: python flag_generator.py [Number of Flags] [Number of Symbols per Flag]")
  exit
# If so, store args in their proper variables and ensure they are the proper types
number_of_flags = int(sys.argv[1])
flag_length = int(sys.argv[2])

# Create Array of Symbols for Flags
symbols = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'

# Generate n Flags and Print them to the Console
for flag in range(number_of_flags):
    print("".join(choice(symbols) for i in range(flag_length)) + "=")
