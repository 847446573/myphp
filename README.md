# myphp
该项目主要是展示一些自己在工作中应用到的代码处理方法，包括设计模式，代码规范,架构设计

1 设计模式(策略模式)  代码在:Src\Service\Ssp下

  广告行业会对接ssp,ssp会有多家，我工作中对接的有蜻蜓，风行等，如果在代码里不停的堆第三方的ssp，程序越堆越多，不便于维护，因为后期会对接无数ssp，而且
  不同的ssp 参数，返回，和流程细节上都不一样，
  我在代码里应用策略的模式，实现，在应用的地方，只需要调用即可，代码易维护，便于管理
 
 
2 模仿java spring ,php mvc中加了一层，service ,service作各model的调用处理，c只负责if else 逻辑，通过php 魔术方法_set,_get实现参数传递
