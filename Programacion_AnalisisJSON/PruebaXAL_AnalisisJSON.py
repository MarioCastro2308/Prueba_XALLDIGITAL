import requests
import json
#Conexion al archivo JSON
url = "https://api.stackexchange.com/2.2/search?order=desc&sort=activity&intitle=perl&site=stackoverflow"
respuesta = requests.get(url).text
data = json.loads(respuesta)

#El siguiente metodo calcula el numero de preguntas contestadas y no contestadas
def getAnswerCount():
    countAnswered = 0
    countNotAnswered = 0
    for items in data["items"]:
        is_answered = items["is_answered"]
        if is_answered == True:
            countAnswered+=1
        else:
            countNotAnswered+=1
    dictIsAnswered = {"Answered":countAnswered,"NotAnswered":countNotAnswered}
    return dictIsAnswered

#El siguiente metodo calcula el Owner con una mayor reputacion
def getMaxOwnerReputation():
    ownerReputation = []
    for items in data["items"]:
       ownerReputation.append(items["owner"]["reputation"])
       
    maxReputation = max(ownerReputation) #Mayor reputacion
    for items in data["items"]:
        reputation = items["owner"]["reputation"]
        if reputation == maxReputation:
            userId = items["owner"]["user_id"]
            userName = items["owner"]["display_name"]
    dictMaxReputation = {"UserId":userId,"UserName":userName,"Reputation":maxReputation}
    return dictMaxReputation

#El siguiente metodo calcula el elemento con menor numero de vistas
def getMinViewCount():
    viewCount = []
    for items in data["items"]:
       viewCount.append(items["view_count"])
       
    minViews = min(viewCount) #menor numero de vistas
    
    for items in data["items"]:
        views = items["view_count"]
        if views == minViews:
            questionId = items["question_id"]
    dictMinViews = {"QuestionId":questionId,"MinViews":minViews}
    return dictMinViews

#El siguiente elemento calcula la fecha de creacion mas antigua y mas actual
def getMinMaxDate():
    creation_date = []
    for items in data["items"]:
        creation_date.append(items["creation_date"])
    minDate = min(creation_date) #fecha de creacion mas antigua
    maxDate = max(creation_date) #fecha de creacion mas actual
    for items in data["items"]:
        date = items["creation_date"]
        if date == minDate:
            questionIdMin = items["question_id"]
        elif date == maxDate:
            questionIdMax = items["question_id"]
    dictDates = {"QuestionIdMin":questionIdMin,
                 "MinDate":minDate,
                 "QuestionIdMax":questionIdMax,
                 "MaxDate":maxDate}
    return dictDates

#LLamada a los metodos
respuesta1 = getAnswerCount()
respuesta2 = getMinViewCount()
respuesta3 = getMinMaxDate()
respuesta4 = getMaxOwnerReputation()

print("\n2. Obtener el número de respuestas contestadas y no contestadas")
print("\nPreguntas contestadas = "+str(respuesta1["Answered"]),
      "\nPreguntas no contestadas = "+str(respuesta1["NotAnswered"]))
print("\n3. Obtener la respuesta con mayor owners")
print("\nEL Owner con una mayor reputacion es el usuario: "+respuesta4["UserName"]+
      " con id "+str(respuesta4["UserId"])+" y cuya reputacion es igual a "+str(respuesta4["Reputation"]))
print("\n4. Obtener la respuesta con menor número de vistas")
print("\nLa pregunta con un menor numero de vistas es la: "+str(respuesta2["QuestionId"]),
      "con un total de: "+str(respuesta2["MinViews"])+" visitas.")
print("\n5. Obtener la respuesta mas vieja y mas actual")
print("\nLa pregunta mas antigua es aquella con el id: "+str(respuesta3["QuestionIdMin"]),
      "cuya fecha de creacion es: "+str(respuesta3["MinDate"]),
      "\nLa pregunta mas reciente es aquella con el id:"+str(respuesta3["QuestionIdMax"]),
      "cuya fecha de creacion es: "+str(respuesta3["MaxDate"]))

