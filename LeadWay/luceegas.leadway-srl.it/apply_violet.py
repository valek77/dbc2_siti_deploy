import re

with open('style.css', 'r') as f:
    content = f.read()

replacements = {
    '#2563EB': '#9A166A',
    '#1D4ED8': '#811158',
    '#1E40AF': '#620D42',
    '#1E3A8A': '#45092E',
    '#3B82F6': '#B72782',
    '#EFF6FF': '#FDF2F8',
    '#DBEAFE': '#F9E0F0',
    '37,99,235': '154,22,106',
    '59,130,246': '183,39,130',
    'rgba(37,99,235': 'rgba(154,22,106',
    'rgba(59,130,246': 'rgba(183,39,130',
}

for k, v in replacements.items():
    content = content.replace(k, v)

with open('style.css', 'w') as f:
    f.write(content)

print("Colors replaced in style.css")
