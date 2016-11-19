import json
import urllib.request
import time
urls = [
"https://api.vk.com/method/board.getComments?group_id=36630127&topic_id=26148249&v=5.52&count=20&start_comment_id={}",
"https://api.vk.com/method/board.getComments?group_id=78357132&topic_id=31151601&v=5.52&count=20&start_comment_id={}",
"https://api.vk.com/method/board.getComments?group_id=41959405&topic_id=27874501&v=5.52&count=20&start_comment_id={}",
"https://api.vk.com/method/board.getComments?group_id=8999834&topic_id=21905779&v=5.52&count=20&start_comment_id={}",
]
f = open("results.txt", "w")
for s in range (len(urls)):
    print("PUBLIC %d " % s)
    url = urls[s].format('0')
    r = urllib.request.urlopen(url)
    d = json.loads(r.read().decode("utf-8"))
    count = d['response']['count']
    for i in range(0, int(count/20)):
        print("%d" % (i * 20))
        url = urls[s].format(i * 20)
        r = urllib.request.urlopen(url)
        d = json.loads(r.read().decode("utf-8"))
        for item in d['response']['items']:
            #print(item['text'])
            f.write("INSERT INTO words (word) VALUES (\'%s\') ON CONFLICT (word) DO NOTHING;\n" % (re.sub('[^A-Za-z0-9]+', '', item['text'][0:26].upper())))
        time.sleep(0.2)
f.close()
