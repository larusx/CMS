set autoindent
filetype on
filetype plugin on
syntax on
set tabstop=4
set cindent
set sw=4
set nocp
set number
set tags=~/.vim/systags
set autochdir
set hidden
let Tlist_Show_One_File=1
let Tlist_Exit_OnlyWindow=1
cs add cscope.out /usr/src/linux-headers-3.2.0-34
nmap <C-\>s :cs find s <C-R>=expand("<cword>")<CR><CR>
nmap <C-\>g :cs find g <C-R>=expand("<cword>")<CR><CR>
nmap <C-\>c :cs find c <C-R>=expand("<cword>")<CR><CR>
nmap <C-\>t :cs find t <C-R>=expand("<cword>")<CR><CR>
nmap <C-\>e :cs find e <C-R>=expand("<cword>")<CR><CR>
nmap <C-\>f :cs find f <C-R>=expand("<cfile>")<CR><CR>
nmap <C-\>i :cs find i ^<C-R>=expand("<cfile>")<CR>$<CR>
nmap <C-\>d :cs find d <C-R>=expand("<cword>")<CR><CR>
