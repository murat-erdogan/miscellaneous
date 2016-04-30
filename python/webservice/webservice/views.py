from django.views.decorators.csrf import csrf_exempt
from django.http import JsonResponse
from django.contrib.auth.models import User
from django.contrib.auth import authenticate
from django.http import HttpResponseForbidden
from django.shortcuts import render
import jwt
from django.utils.dateformat import format
import datetime


@csrf_exempt
def signin(request):
    if request.POST:
        email = request.POST['email']
        password = request.POST['password']
        username = User.objects.get(email=email).username
        u = authenticate(username=username, password=password)
        if u:
            timestamp = format(datetime.datetime.now(), u'U')
            token = jwt.encode({'username': username, 'timestamp': timestamp}, 'sliide', algorithm='HS256')
            return JsonResponse({'token': token.decode('utf-8')})
        else:
            return HttpResponseForbidden("Error 403 Forbidden", content_type="text/plain")
    else:
        return HttpResponseForbidden("Error 403 Forbidden", content_type="text/plain")


@csrf_exempt
def logs(request):
    logs = [{
        "email": "email@email.com",
        "action": "view",
        "date": "11.12.2016"
    },
    {
        "email": "some@email.com",
        "action": "delete",
        "date": "11.08.2016"
    },
    {
        "email": "yetanother@email.com",
        "action": "add",
        "date": "22.07.2016"
    }]

    header = request.META.get('HTTP_AUTHORIZATION')
    token = header[7:]
    try:
        payload = jwt.decode(token, 'sliide')
    except jwt.InvalidTokenError:
        return HttpResponseForbidden("Error 403 Forbidden", content_type="text/plain")
    else:
        now = format(datetime.datetime.now(), u'U')
        diff = int(now) - int(payload['timestamp'])
        if diff < 600:
            return JsonResponse(logs, safe=False)
        else:
            return HttpResponseForbidden("Error 403 Forbidden", content_type="text/plain")


@csrf_exempt
def login(request):
    return render(request, 'login.html', {})
