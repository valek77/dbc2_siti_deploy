import re
with open('style.css', 'r') as f:
    content = f.read()

replacements = {
    '16,185,129': '37,99,235',
    '132,204,22': '234,179,8',
    '52,211,153': '59,130,246',
    '#10B981': '#2563EB',
    '#84CC16': '#EAB308',
    '#BEF264': '#FDE047',
    '#4D7C0F': '#CA8A04',
    '#059669': '#1D4ED8',
    '#064E3B': '#1E3A8A',
    '#34D399': '#3B82F6',
    '#065F46': '#1E40AF',
}

for k, v in replacements.items():
    content = content.replace(k, v)

with open('style.css', 'w') as f:
    f.write(content)
