<div wire:key="foo" class="mb-3">
    <div class="form-group">
       <label for="state" class="form-label">Customer Name</label>
       <div class="">
           <select wire:key="id"  name="name" wire:model="selectedState" class="form-control">
               @foreach($states as $state)
                 <option selected value="{{ $state->id  }}">{{ $state->name }}</option>
               @endforeach
           </select>
       </div>
   </div>

   

   @if (($selectedState))
       <div class="form-group">
           <label  class="form-label">Customer Phone Number</label>
               <select  class="form-control" name="phone">
                   @foreach($phones as $phone)
                       <option value="{{ $phone->phone }}">{{ $phone->phone }}</option>
                   @endforeach
               </select>
       </div>


       <div class="form-group">
           <label  class="form-label">Customer Address</label>
               <select   class="form-control" name="address">
                   @foreach($address as $addresses)
                       <option value="{{ $addresses->address }}">{{ $addresses->address }}</option>
                   @endforeach
               </select>
       </div>

       <div  hidden class="form-group">
           <label  class="form-label">Customer ID</label>
               <select class="form-control" name="customer_id">
                   @foreach($custid as $custids)
                       <option value="{{ $custids->id }}">{{ $custids->id }}</option>
                   @endforeach
               </select>
       </div>
       @else
       <div class="form-group"> <label  class="form-label">Customer Phone Number</label><span readonly class="form-control" name="phone"> </span></div>
       <div class="form-group"><label  class="form-label">Customer Address</label> <span readonly class="form-control" ></span></div>
       <div hidden class="form-group"><label  class="form-label">Customer ID</label><span class="form-control" ></span></div>
       @endif
</div>