items = [3, 8, 5, 1, 4]
values = [27, 10, 12, 37, 15]
capacity = 17

table = [[0 for i in range(capacity+1)] for i in range(len(items)+1)]

for i in range(1, len(items)+1):
    for c in range(1, capacity+1):
        if items[i-1] > c:
            table[i][c] = table[i - 1][c]
        else:
            table[i][c] = max(values[i - 1] + table[i - 1][c - items[i - 1]], table[i - 1][c])

for i in table:
    print(i)

print("result", table[-1][-1])