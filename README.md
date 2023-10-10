### …or create a new repository on the command line
```shell
echo "# admin" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M master
git remote add origin http://192.168.1.193:8080/git/root/admin.git   
git push -u origin master
```
### …or push an existing repository from the command line
```shell
git remote add origin http://192.168.1.193:8080/git/root/admin.git   
git branch -M master
git push -u origin master
```