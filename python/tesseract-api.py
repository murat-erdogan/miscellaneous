import os
import ctypes

"""
those b"" and decode('utf-8') are so important for python3
otherwise it will display a silly error which is not helping at all
also use apt-get install libtesseract-dev to install libs
so I did not bother building tesseract even for shared libraries
tested on only tesseract 3.0.3
bear in mind, after cloning repo you may have different version
and it may need completely different configuration, different api
Update: tesseract version 3.04.01 is giving a segmentation fault!
"""

lang = b"eng"
filename = b"/home/murat/test.jpg"
libname = b"/usr/lib/libtesseract.so.3"
tessdata = b"/usr/share/tesseract-ocr"

tesseract = ctypes.cdll.LoadLibrary(libname)

api = tesseract.TessBaseAPICreate()
tesseract.TessBaseAPIInit3(api, tessdata, lang);

text_out = tesseract.TessBaseAPIProcessPages(api, filename, None , 0);
result_text = ctypes.string_at(text_out)
print(result_text.decode('utf-8'))
