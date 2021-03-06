"""
This is a workaround kinda solution to segmentation fault appeared in version 3.04.
It occurs because in version 3.04 C-API is completely changed 
and demo code in main tesseract repository needs to be updated.
"""

import os
from ctypes import *

lang = b"eng"
filename = b"/home/murat/Desktop/test.png"
libname = b"/usr/lib/libtesseract.so.3"
tessdata = b"/usr/share/tesseract-ocr"

tesseract = cdll.LoadLibrary(libname)

class TessBaseAPI(Structure):
    pass
class TessResultRenderer(Structure):
    pass

tesseract.TessBaseAPICreate.restype = POINTER(TessBaseAPI)
tesseract.TessBaseAPIInit3.argtypes = [POINTER(TessBaseAPI), c_char_p, c_char_p]
tesseract.TessBaseAPIInit3.restype = c_bool
tesseract.TessBaseAPIProcessPages.argtypes = [POINTER(TessBaseAPI), c_char_p, c_char_p, c_int, POINTER(TessResultRenderer)]
tesseract.TessBaseAPIProcessPages.restype = c_bool
tesseract.TessBaseAPIGetUTF8Text.argtypes = [POINTER(TessBaseAPI)]
tesseract.TessBaseAPIGetUTF8Text.restype = c_char_p

api = tesseract.TessBaseAPICreate()
rc = tesseract.TessBaseAPIInit3(api, tessdata, lang);
if (rc):
    tesseract.TessBaseAPIDelete(api)
    print("Could not initialize tesseract.\n")
    exit(3)

success = tesseract.TessBaseAPIProcessPages(api, filename, None , 0, None)

if success:
    text = tesseract.TessBaseAPIGetUTF8Text(api)
    print(text.decode("utf-8").strip())
